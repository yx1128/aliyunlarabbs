<?php

namespace App\Http\ApiControllers;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\Criteria\FilterManager;
use App\Transformers\TopicTransformer;
use Phphub\Core\CreatorListener;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Vote;
use App\Models\Machine;
use Gate;
use Auth;
use App\Activities\UserPublishedNewTopic;
use App\Activities\BlogHasNewArticle;


class DiscussionsController extends Controller implements CreatorListener
{

  public function store(Request $request)
  {
      if (!Auth::user()->verified) {
          throw new StoreResourceFailedException('创建话题失败，请验证用户邮箱');
      }

      $data = $request->except('_token');

      $machine = Machine::findOrFail($request->machine_id);
      $data['machine_id'] = $machine->id;
      $machine->increment('article_count', 1);
      return app('Phphub\Creators\TopicCreator')->create($this, $data, $machine);
  }

  /**
   * ----------------------------------------
   * CreatorListener Delegate
   * ----------------------------------------
   */

  public function creatorFailed($errors)
  {
      throw new StoreResourceFailedException('创建话题失败：'. output_msb($errors->getMessageBag()) );
  }

  public function creatorSucceed($topic)
  {
      return $this->response()->item($topic, new TopicTransformer());
  }

}
