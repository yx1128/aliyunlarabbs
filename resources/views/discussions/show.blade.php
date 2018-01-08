@extends('layouts.default')

@section('title')
{{ $topic->title}} | @parent
@stop

@section('styles')
 {!! Charts::assets() !!}
 @stop

@section('content')



<div class="blog-pages">

          <div class="col-md-9 left-col pull-right">

              <div class="panel article-body content-body">

                  <div class="panel-body">

                    <h1 class="text-center">
                        {{ $topic->title }}
                    </h1>



                    <div class="article-meta text-center">
                        <i class="fa fa-clock-o"></i> <abbr title="{{ $topic->created_at }}" class="timeago">{{ $topic->created_at }}</abbr>
                        ⋅
                        <i class="fa fa-eye"></i> {{ $topic->view_count }}
                        ⋅
                        <i class="fa fa-thumbs-o-up"></i> {{ $topic->vote_count }}
                        ⋅
                        <i class="fa fa-comments-o"></i> {{ $topic->reply_count }}

                    </div>

                    @if($point != 0)

                    <div class="form-group">
                       {!! $chart->render() !!}
                     </div>
                     @endif

                    <div class="entry-content">

                        @include('topics.partials.body', array('body' => $topic->body))

                    </div>
                    <div class="post-info-panel">
                        <p class="info">
                            <label class="info-title">版权声明：</label><i class="fa fa-fw fa-creative-commons"></i>自由转载-非商用-非衍生-保持署名（<a href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>）
                        </p>
                    </div>
                    <br>
                    <br>
                    @include('topics.partials.topic_operate', ['is_discussion' => true, 'manage_topics' => $currentUser ? ($currentUser->can("manage_topics") && $currentUser->roles->count() <= 5) : false])

                  </div>

              </div>
                  @include('topics.partials.show_segment')
          </div>

          @if( $topic->user->payment_qrcode )
              @include('topics.partials.payment_qrcode_modal')
          @endif

          <div class="col-md-3 main-col pull-left">
              @include('machines._info')

              <div id="sticker">

                  <div class="panel panel-default corner-radius">

                    <div class="panel-heading text-center">
                      <h3 class="panel-title">作者：{{ $topic->user->name }}</h3>
                    </div>

                      <div class="panel-body text-center topic-author-box">
                          @include('topics.partials.topic_author_box')

                          @if(Auth::check() && $currentUser->id != $topic->user->id)
                              <span class="text-white">
                                  <?php $isFollowing = $currentUser && $currentUser->isFollowing($topic->user->id) ?>
                                  <hr>
                                  <a data-method="post" class="btn btn-{{ !$isFollowing ? 'warning' : 'default' }} btn-block" href="javascript:void(0);" data-url="{{ route('users.doFollow', $topic->user->id) }}" id="user-edit-button">
                                     <i class="fa {{!$isFollowing ? 'fa-plus' : 'fa-minus'}}"></i> {{ !$isFollowing ? '关注 Ta' : '已关注' }}
                                  </a>

                                  <a class="btn btn-default btn-block" href="{{ route('messages.create', $topic->user->id) }}" >
                                     <i class="fa fa-envelope-o"></i> 发私信
                                  </a>
                              </span>
                          @endif
                      </div>
                  </div>
              </div>
              @if (count($userTopics))

              <div class="recommended-wrap">
                  <div class="panel panel-default corner-radius recommended-articles">
                      <div class="panel-heading text-center">
                        <h3 class="panel-title">设备讨论推荐</h3>
                      </div>
                      <div class="panel-body">
                        @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $userTopics, 'is_article' => true])
                      </div>
                  </div>
              </div>

              @endif

          </div>

  </div>

@stop

@section('scripts')
<script type="text/javascript">

    $(document).ready(function()
    {
        Config.following_users =  @if($currentUser) {!!$currentUser->present()->followingUsersJson()!!} @else [] @endif;
        PHPHub.initAutocompleteAtUser();
    });

</script>
@stop
