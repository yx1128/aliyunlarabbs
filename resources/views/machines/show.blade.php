@extends('layouts.default')

@section('title')
{{ $machine->name }} | @parent
@stop

@section('content')
<link rel="stylesheet" href="http://phphub5.app//build/assets/css/bootstrap-datetimepicker.min.css">
<div class="blog-pages">


        <div class="col-md-3 main-col pull-left">
            @include('machines._info')
        </div>

          <div class="col-md-9 left-col pull-right">

              <div class="panel article-body article-index">
                <form method="POST" action="{{ route('machines.search') }}">
                  {{ csrf_field() }}
                  <div class="panel-body">
                    <h3 class="all-articles">
                        设备趋势查询
                        <div class="form-group status-post-submit">
                            <button class="btn btn-primary pull-right no-pjax" type="submit">查询</button>
                        </div>
                      </h3>
                      <div class="container">
                         <div class="row">
                         <input name="machineid" type="hidden" value="{{ $machine->id }}">
                          <div class="col-md-4 form-group" style="width:240px">

                              <select class="form-control" name="point">
                                <option value="" disabled {{ 'selected' }}>选择测点</option>
                                @foreach ($points as $point)
                                <option value="{{ $point->id }}">{{ $point->name }}</option>
                                @endforeach
                             </select>
                         </div>
                      <div class="col-md-4 form-group" style="width:200px">
                        <input class="form-control" placeholder="查询开始时间" size="15" type="text" name="startTime" id="datetimeStart" readonly class="form_datetime">
                      </div>

                      <div class="col-md-4 form-group" style="width:200px">
                        <input class="form-control" placeholder="查询结束时间" size="15" type="text" name="endTime" id="datetimeEnd" readonly class="form_datetime">
                      </div>
                    </div>
                  </div>
                  </form>
                  <hr>
                @if($machine->image != null)
                  @include('machines._images')
                @endif
                </div>
              </div>
      <div class="panel article-body article-index">
         <div class="panel-body">
                    <h1 class="all-articles">
                        设备讨论
                          <a href="{{ route('discussions.create', ['machine_id' => $machine->id]) }}" class="btn btn-primary pull-right no-pjax"> <i class="fa fa-paint-brush"></i> 发起讨论</a>
                    </h1>
                          @if (count($topics))
                            <ul class="list-group">
                               @foreach ($topics as $index => $topic)
                               <li class="list-group-item" >
                                 <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{{ $topic->user->name }}}" class="avatar-wrap">
                                     <img class="avatar avatar-small" alt="{{{ $topic->user->name }}}" src="{{ $topic->user->present()->gravatar }}"/>
                                 </a>
                                 <a href="{{ $topic->link() }}" title="{{{ $topic->title }}}" class="title">
                                   {{{ str_limit($topic->title, '100') }}}
                                 </a>
                                 <span class="meta">
                                 <span> ⋅ </span>
                                 {{ $topic->vote_count }} {{ lang('Up Votes') }}
                                 <span> ⋅ </span>
                                 {{ $topic->reply_count }} {{ lang('Replies') }}
                                 <span> ⋅ </span>
                                 <span class="timeago">{{ $topic->created_at }}</span>
                               </span>
                             </li>
                             @endforeach
                            </ul>
                            <div class="pull-right add-padding-vertically">
                                {!! $topics->render() !!}
                            </div>
                          @else
                            <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
                          @endif







                  </div>

              </div>

        </div>




</div>
@section('scripts')
<script  type="text/javascript" src="http://phphub5.app//build/assets/js/bootstrap-datetimepicker.min.js"></script>
<script  type="text/javascript" src="http://phphub5.app//build/assets/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <script type="text/javascript">
        $("#datetimeStart").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            minView:'hour',
            language: 'zh-CN',
            autoclose:true,
        }).on("click",function(){
            $("#datetimeStart").datetimepicker("setEndDate",$("#datetimeEnd").val())
        });
        $("#datetimeEnd").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            minView:'hour',
            language: 'zh-CN',
            autoclose:true,
        }).on("click",function(){
            $("#datetimeEnd").datetimepicker("setStartDate",$("#datetimeStart".val()))
        });
    </script>
@stop

@stop
