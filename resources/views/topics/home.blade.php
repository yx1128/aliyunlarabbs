@extends('layouts.default')

@section('title')
{{ lang('Topic List') }} @parent
@stop

@section('content')

<div class="container">
   <div class="row" >

 <div class="col-md-12 topics-index main-col">
   <div class="panel panel-default corner-radius">
    <div class="panel-body topic-author-box blog-info">
     <ul class="list-group row topic-list">
       <div class="panel-heading text-center">
          <a href="{{ route('categories.show', 1) }}">新闻</a>
       </div>
       <div class="panel panel-default">
   @include('topics.partials.homes', ['filterd_topics' => $topics])
   </div>
     </ul>
    <div class="text-right">
     <a href="{{ route('categories.show', 1)}}">查看更多</a>
   </div>
   </div>
  </div>
 </div>

</div>
</div>

@stop
