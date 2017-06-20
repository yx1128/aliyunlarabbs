<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Phphub\Core\CreatorListener;
use App\Models\Post;
use App\Models\User;
use App\Models\Topic;
use App\Models\Banner;
use App\Models\Machine;
use App\Models\Point;
use App\Models\Value;
use Auth;
use Flash;
use Phphub\Markdown\Markdown;
use Charts;

use App\Http\Requests\StoreTopicRequest;

class DiscussionsController extends Controller implements CreatorListener
{
    public function __construct()
    {
         $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function create(Request $request)
  	{
          $user = Auth::user();
          $topic = new Topic;

          $machine = $request->machine_id ? Machine::findOrFail($request->machine_id) : Auth::user()->machines()->first();

  		return view('discussions.create_edit', compact('topic', 'user', 'machine'));
  	}

    public function store(StoreTopicRequest $request)
  	{
          $data = $request->except('_token');

          $machine = Machine::findOrFail($request->machine_id);
          $data['machine_id'] = $machine->id;

          if ($request->subject == 'draft') {
              $data['is_draft'] = 'yes';
          }
          $machine->increment('article_count', 1);
          return app('Phphub\Creators\TopicCreator')->create($this, $data, $machine);
  	}

    public function transform($id)
  	{
          Auth::user()->decrement('topic_count', 1);
          Auth::user()->increment('discussion_count', 1);
          $topic = Topic::find($id);
          $topic->update([
              'category_id' => config('phphub.machine_category_id')
          ]);
          Flash::success(lang('Operation succeeded.'));
          return redirect()->to($topic->links());
  	}

    public function show($id)
  	{
          // See: TopicsController->show
  	}

    public function edit($id)
  	{
  		$topic = Topic::findOrFail($id);
  		return view('discussions.create_edit', compact('topic'));
  	}

  	public function update($id, StoreTopicRequest $request)
  	{
          // See: TopicsController->update
  	}

    /**
     * ----------------------------------------
     * CreatorListener Delegate
     * ----------------------------------------
     */

     public function creatorFailed($error)
     {
         Flash::error('发布失败：' . $error);
         return redirect()->back();
     }

    public function creatorSucceed($topic)
    {
        Flash::success(lang('Operation succeeded.'));
        return redirect()->to($topic->links());
        //return redirect()->action('PagesController@about');
    }
}
