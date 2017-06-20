<div class="col-md-3 side-bar">

    @if (Auth::check() && Auth::user()->draft_count > 0)
        <div class="text-center alert alert-warning">
            <a href="{{ route('users.drafts') }}" style="color:inherit;"><i class="fa fa-file-text-o"></i> 草稿 {{ Auth::user()->draft_count }} 篇</a>
        </div>
    @endif


    @if (isset($topic))
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
  @endif


  @if (isset($userTopics) && count($userTopics))
  <div class="panel panel-default corner-radius">
    <div class="panel-heading text-center">
      <h3 class="panel-title">{{ $topic->user->name }} 的其他话题</h3>
    </div>
    <div class="panel-body">
      @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $userTopics])
    </div>
  </div>
  @endif


  @if (isset($categoryTopics) && count($categoryTopics))
  <div class="panel panel-default corner-radius">
    <div class="panel-heading text-center">
      <h3 class="panel-title">{{ lang('Same Category Topics') }}</h3>
    </div>
    <div class="panel-body">
      @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $categoryTopics])
    </div>
  </div>
  @endif


@if (Route::currentRouteName() == 'topics.index')
    @include('layouts.partials._resources_panel')
@endif

@if (isset($active_users) && count($active_users))
    <div class="panel panel-default corner-radius panel-active-users">
      <div class="panel-heading text-center">
        <h3 class="panel-title">{{ lang('Active Users') }}（<a href="{{ route('hall_of_fames') }}"><i class="fa fa-star" aria-hidden="true"></i> {{ lang('Hall of Fame') }}</a>）</h3>
      </div>
      <div class="panel-body">
        @include('topics.partials.active_users')
      </div>
    </div>
@endif

@if (isset($hot_topics) && count($hot_topics))
<div class="panel panel-default corner-radius panel-hot-topics">
  <div class="panel-heading text-center">
    <h3 class="panel-title">一周最热话题</h3>
  </div>
  <div class="panel-body">
    @include('layouts.partials.sidebar_topics', ['sidebarTopics' => $hot_topics, 'numbered' => true])
  </div>
</div>
@endif


<!--  <div class="panel panel-default corner-radius">
    <div class="panel-body text-center sidebar-sponsor-box">
        @if(isset($banners['sidebar-sponsor']))
            @foreach($banners['sidebar-sponsor'] as $banner)
                <a class="sidebar-sponsor-link" href="{{ $banner->link }}" target="_blank">
                    <img src="{{ $banner->image_url }}" class="popover-with-html" data-content="{{ $banner->title }}" width="100%">
                </a>
            @endforeach
        @endif
  </div>
</div>

@if (Route::currentRouteName() != 'home')
  @if (isset($links) && count($links))
    <div class="panel panel-default corner-radius">
      <div class="panel-heading text-center">
        <h3 class="panel-title">{{ lang('Links') }}</h3>
      </div>
      <div class="panel-body text-center" style="padding-top: 5px;">
        @foreach ($links as $link)
            <a href="{{ $link->link }}" target="_blank" rel="nofollow" title="{{ $link->title }}" style="padding: 3px;">
                <img src="{{ $link->cover }}" style="width:150px; margin: 3px 0;">
            </a>
        @endforeach
      </div>
    </div>
  @endif
@endif-->


<div id="sticker">


<div class="panel panel-default corner-radius" style="color:#a5a5a5">
  <div class="panel-body text-center">
      <a href="{{ Auth::check() ? 'http://phphub5.app/messages/to/1' : '1262937469@qq.com'}}" style="color:#a5a5a5">
          <span style="margin-top: 7px;display: inline-block;">
              <i class="fa fa-heart" aria-hidden="true" style="color: rgba(232, 146, 136, 0.89);"></i> 建议反馈？请私信
          </span>
      </a>
  </div>
</div>

</div>
</div>
<div class="clearfix"></div>
