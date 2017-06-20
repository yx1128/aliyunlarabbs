@extends('layouts.default')

@section('title')
{{ $topic->title}} | @parent
@stop

@section('wechat_icon')
<img src="{{ img_crop($machine->cover, 512, 512) }}" alt="">
@stop

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.4/css/highcharts.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/JavaScript" src="http://code.highcharts.com/stock/highstock.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.2/js/modules/exporting.js"></script>
<div class="blog-pages">

          <div class="col-md-9 left-col pull-right">

              <div class="panel article-body content-body">

                  <div class="panel-body">

                    <h1 class="text-center">
                        {{ $topic->title }}
                    </h1>

                    <!--@if ($topic->is_draft == 'yes')
                        <div class="text-center alert alert-warning">
                            当前状态为 <i class="fa fa-file-text-o"></i> 草稿，仅作者可见，请前往 <a href="{{ route('discussions.edit', $topic->id) }}" class="no-pjax">编辑发布</a>
                        </div>
                    @endif-->

                    <div class="article-meta text-center">
                        <i class="fa fa-clock-o"></i> <abbr title="{{ $topic->created_at }}" class="timeago">{{ $topic->created_at }}</abbr>
                        ⋅
                        <i class="fa fa-eye"></i> {{ $topic->view_count }}
                        ⋅
                        <i class="fa fa-thumbs-o-up"></i> {{ $topic->vote_count }}
                        ⋅
                        <i class="fa fa-comments-o"></i> {{ $topic->reply_count }}

                    </div>

                    <div class="entry-content">
                      @if($point != 0)
                      <div>
                         {!! $chart->render() !!}
                       </div>
                       @endif
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
