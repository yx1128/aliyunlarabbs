<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use Laracasts\Presenter\PresentableTrait;
use Carbon\Carbon;
use App\Jobs\SendNotifyMail;

class Notification extends Model
{
    use PresentableTrait;
    public $presenter = 'Phphub\Presenters\NotificationPresenter';

    // Don't forget to fill this array
    protected $fillable = ['from_user_id','user_id','topic_id','reply_id','body','type','point_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function fromValue()
    {
        return $this->belongsTo(Value::class, 'point_id');
    }

    // for api
    public function from_user()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    /**
     * Create a notification
     * @param  [type] $type     currently have 'at', 'new_reply', 'attention', 'append'
     * @param  User   $fromUser come from who
     * @param  array  $users   to who, array of users
     * @param  Topic  $topic    cuurent context
     * @param  Reply  $reply    the content
     * @return [type]           none
     */
    public static function batchNotify($type, User $fromUser, $users, Topic $topic, Reply $reply = null, $content = null)
    {
        $nowTimestamp = Carbon::now()->toDateTimeString();
        $data = [];
        foreach ($users as $toUser) {
            if ($fromUser->id == $toUser->id) {
                continue;
            }

            $data[] = [
                'from_user_id' => $fromUser->id,
                'user_id'      => $toUser->id,
                'topic_id'     => $topic->id,
                'reply_id'     => $content ?: ($reply ? $reply->id : '' ),
                'body'         => $content ?: ($reply ? $reply->body : '' ),
                'type'         => $type,
                'created_at'   => $nowTimestamp,
                'updated_at'   => $nowTimestamp
            ];

            $toUser->increment('notification_count', 1);
        }

        if (count($data)) {
            Notification::insert($data);
            foreach ($users as $toUser) {
                $job = (new SendNotifyMail($type, $fromUser, $toUser, $topic, $reply, $content))
                                ->delay(config('phphub.notify_delay'));
                dispatch($job);
            }
        }

        foreach ($data as $value) {
            self::pushNotification($value);
        }
    }

    public static function notified($type, $users, Value $fromValue)
     {
          $nowTimestamp = Carbon::now()->toDateTimeString();
          $data = [];
          foreach ($users as $toUser) {

            $data[] = [
               'from_user_id' => 0,
               'user_id'      => $toUser->id,
               'topic_id'     => 0,
               'reply_id'     => 0,
               'body'         => '',
               'type'         => $type,
               'created_at'   => $nowTimestamp,
               'updated_at'   => $nowTimestamp,
               'point_id'     => $fromValue->id
             ];

                $toUser->increment('notification_count', 1);

                $fromValue->is_warned = 0;
                $fromValue->save();

            }

            if (count($data)) {
              foreach ($data as $value) {
                  Notification::insert($value);
              }
            }

              //self::pushNotification($data);

   }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public static function notify($type, User $fromUser, User $toUser, Topic $topic = null, Reply $reply = null)
    {
        if ($fromUser->id == $toUser->id) {
            return;
        }

        if ($topic && Notification::isNotified($fromUser->id, $toUser->id, $topic->id, $type)) {
            return;
        }

        $nowTimestamp = Carbon::now()->toDateTimeString();

        $data = [
            'from_user_id' => $fromUser->id,
            'user_id'      => $toUser->id,
            'topic_id'     => $topic ? $topic->id : 0,
            'reply_id'     => $reply ? $reply->id : 0,
            'body'         => $reply ? $reply->body : '',
            'type'         => $type,
            'created_at'   => $nowTimestamp,
            'updated_at'   => $nowTimestamp,
            'point_id'     => 0
        ];

        $toUser->increment('notification_count', 1);

        Notification::insert([$data]);

        $job = (new SendNotifyMail($type, $fromUser, $toUser, $topic, $reply))
                                ->delay(config('phphub.notify_delay'));
        dispatch($job);

        self::pushNotification($data);
    }

    public static function pushNotification($data)
    {
        $notification = Notification::query()
                ->with('fromUser', 'topic')
                ->where($data)
                ->first();

        if (!$notification) {
            return;
        }

        $from_user_name = $notification->fromUser->name;
        $topic_title    = $notification->topic ? $notification->topic->title : '关注了你';

        $msg = $from_user_name
                . ' • ' . $notification->present()->lableUp()
                . ' • ' . $topic_title;

        $push_data = array_only($data, [
            'topic_id',
            'from_user_id',
            'type',
        ]);

        if ($data['reply_id'] !== 0) {
            $push_data['reply_id']    = $data['reply_id'];
            // $push_data['replies_url'] = route('replies.web_view', $data['reply_id']);
        }
    }

    public static function isNotified($from_user_id, $user_id, $topic_id, $type)
    {
        $notifys = Notification::fromwhom($from_user_id)
                        ->toWhom($user_id)
                        ->atTopic($topic_id)
                        ->withType($type)->get();
        return $notifys->count();
    }

    public function scopeFromWhom($query, $from_user_id)
    {
        return $query->where('from_user_id', '=', $from_user_id);
    }

    public function scopeToWhom($query, $user_id)
    {
        return $query->where('user_id', '=', $user_id);
    }

    public function scopeWithType($query, $type)
    {
        return $query->where('type', '=', $type);
    }

    public function scopeAtTopic($query, $topic_id)
    {
        return $query->where('topic_id', '=', $topic_id);
    }
}
