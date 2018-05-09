@extends('layouts.default')

@section('title')
{{ lang('Topic List') }} @parent
@stop

@section('content')

<div class="col-md-9 topics-index main-col">

    @if (isset($category) && $category->id == config('phphub.qa_category_id'))
        <div class="alert alert-info">
            在社区，我们不提倡新手提问，如果你遇到难题，请先搜索再 <a href="{{ route('topics.create', ['category_id' => config('phphub.qa_category_id')]) }}" class="btn btn-warning">提问</a>
        </div>
    @endif
    <div class="panel panel-default">

        <div class="panel-heading">

          <ul class="list-inline topic-filter">
                <li class="popover-with-html" data-content="最后回复排序"><a {!! app(App\Models\Topic::class)->present()->topicFilter('default') !!}>活跃</a></li>
                <li class="popover-with-html" data-content="只看加精的话题"><a {!! app(App\Models\Topic::class)->present()->topicFilter('excellent') !!}>{{ lang('Excellent') }}</a></li>
                <li class="popover-with-html" data-content="点赞数排序"><a {!! app(App\Models\Topic::class)->present()->topicFilter('vote') !!}>{{ lang('Vote') }}</a></li>
                <li class="popover-with-html" data-content="发布时间排序"><a {!! app(App\Models\Topic::class)->present()->topicFilter('recent') !!}>{{ lang('Recent') }}</a></li>
                <li class="popover-with-html" data-content="无人问津的话题"><a {!! app(App\Models\Topic::class)->present()->topicFilter('noreply') !!}>{{ lang('Noreply') }}</a></li>
            </ul>

          <div class="clearfix"></div>
        </div>

        @if ( ! $topics->isEmpty())

            <div class="jscroll">
                <div class="panel-body remove-padding-horizontal">
                    @include('topics.partials.topics')
                </div>

                <div class="panel-footer text-right remove-padding-horizontal pager-footer">
                    <!-- Pager -->
                    {!! $topics->appends(Request::except('page', '_pjax'))->render() !!}
                </div>
            </div>

        @else
            <div class="panel-body">
                <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
            </div>
        @endif

    </div>

    <!-- Nodes Listing -->
    @include('nodes.partials.list')

</div>

@include('layouts.partials.sidebar')

@stop
