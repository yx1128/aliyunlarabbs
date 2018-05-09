@extends('layouts.default')

@section('content')

<div class="box text-center site-intro rm-link-color">
  {!! lang('site_intro') !!}
</div>
<div id="myCarousel" class="carousel slide">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
    <div class="item active">
			  <img src="http://47.52.168.98/assets/images/1.jpg">
		</div>
    <div class="item">
			  <img src="http://47.52.168.98/assets/images/2.jpg">
		</div>
    <div class="item">
			  <img src="http://47.52.168.98/assets/images/3.jpg">
		</div>

	</div>
	<!-- 轮播（Carousel）导航 -->
	<a class="carousel-control left" href="#myCarousel"
	   data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#myCarousel"
	   data-slide="next">&rsaquo;</a>
</div>
<hr>
@include('layouts.partials.topbanner')



<div class="panel panel-default list-panel home-topic-list">
  <div class="panel-heading">
    <h3 class="panel-title text-center">
      {{ lang('Excellent Topics') }} &nbsp;
      <a href="{{ route('feed') }}" style="color: #E5974E; font-size: 14px;" target="_blank">
         <i class="fa fa-rss"></i>
      </a>
    </h3>

  </div>

  <div class="panel-body ">
	@include('pages.partials.topics')
  </div>

  <div class="panel-footer text-right">

  	<a href="topics?filter=excellent" class="more-excellent-topic-link">
  		{{ lang('More Excellent Topics') }} <i class="fa fa-arrow-right" aria-hidden="true"></i>
  	</a>
  </div>
</div>

@stop
