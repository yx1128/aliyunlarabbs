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
         @include('topics.partials.homes', ['filterd_topics' => $news])
      </div>
     </ul>
    <div class="text-right">
     <a href="{{ route('categories.show', 1)}}">查看更多</a>
   </div>
   </div>
  </div>
 </div>


    <div class="col-md-6 topics-index main-col">
      <div class="panel panel-default corner-radius">
        <div class="panel-body topic-author-box blog-info">
      <ul class="list-group row topic-list">
        <div class="panel-heading  text-center">
            <a href="{{ route('categories.show', config('phphub.qa_category_id')) }}">问答</a>
        </div>
       <div class="panel panel-default">
         @include('topics.partials.homes', ['filterd_topics' => $questions])
      </div>
    </ul>
    <div class="text-right">
     <a href="{{ route('categories.show', config('phphub.qa_category_id'))}}">查看更多</a>
   </div>
  </div>
</div>
</div>


  <div class="col-md-6 topics-index main-col">
    <div class="panel panel-default corner-radius">
      <div class="panel-body topic-author-box blog-info">
    <ul class="list-group row topic-list">
      <div class="panel-heading text-center">
          <a href="{{ route('categories.show', 5) }}">分享</a>
      </div>
     <div class="panel panel-default">
       @include('topics.partials.homes', ['filterd_topics' => $shares])
    </div>
  </ul>
  <div class="text-right">
   <a href="{{ route('categories.show', 5)}}">查看更多</a>
 </div>
</div>
</div>
</div>

  <div class="col-md-6 topics-index main-col">
    <div class="panel panel-default corner-radius">
      <div class="panel-body topic-author-box blog-info">
    <ul class="list-group row topic-list">
      <div class="panel-heading text-center">
          <a href="{{ route('categories.show', 6) }}">教程</a>
      </div>
     <div class="panel panel-default">
        @include('topics.partials.homes', ['filterd_topics' => $courses])
     </div>
    </ul>
    <div class="text-right">
     <a href="{{ route('categories.show', 6)}}">查看更多</a>
   </div>
  </div>
</div>
</div>

   <div class="col-md-6 topics-index main-col">
     <div class="panel panel-default corner-radius">
       <div class="panel-body topic-author-box blog-info">
     <ul class="list-group row topic-list">
       <div class="panel-heading text-center">
           <a href="{{ route('categories.show', config('phphub.blog_category_id')) }}">专栏</a>
       </div>
       <div class="panel panel-default">
         @include('topics.partials.homes', ['filterd_topics' => $blogs])
      </div>
    </ul>
    <div class="text-right">
     <a href="{{ route('categories.show', config('phphub.blog_category_id'))}}">查看更多</a>
   </div>
  </div>
</div>
</div>

   <div class="col-md-6 topics-index main-col">
     <div class="panel panel-default corner-radius">
       <div class="panel-body topic-author-box blog-info">
     <ul class="list-group row topic-list">
       <div class="panel-heading text-center">
           <a href="{{ route('categories.show',  config('phphub.machine_category_id')) }}">设备</a>
       </div>
       <div class="panel panel-default">
         @include('topics.partials.homes', ['filterd_topics' => $machines])
       </div>
    </ul>
    <div class="text-right">
     <a href="{{ route('categories.show', config('phphub.machine_category_id'))}}">查看更多</a>
   </div>
   </div>
 </div>
 </div>

 </div>
</div>



@stop
