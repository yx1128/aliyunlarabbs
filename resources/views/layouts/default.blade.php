<!DOCTYPE html>
<html lang="zh">
	<head>

		<meta charset="utf-8">

		<title>@section('title')社区@show</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

		<meta name="keywords" content="php,laravel,php论坛,laravel论坛,php社区,laravel社区,laravel教程,php教程,laravel视频,php开源,php新手,php7,laravel5" />
		<meta name="author" content="PHPHub" />
		<meta name="description" content="@section('description') Laravel China 是国内最大的 Laravel 和 PHP 中文社区，致力于推动 Laravel，PHP7、php-fig 等 PHP 新技术，新理念在中国的发展，是国内最靠谱的 PHP 论坛。 @show" />
        <meta name="_token" content="{{ csrf_token() }}">


       <link rel="stylesheet" href="{{ cdn(elixir('assets/css/styles.css')) }}"/>

        <link rel="shortcut icon" href="{{ cdn('favicon1.png') }}"/>



       <script src="http://47.52.168.98/build/assets/js/jquery-3.1.1.min.js"></script>
			 <!--<script src="http://code.highcharts.com/stock/highstock.js"></script>-->

        <script>
            Config = {
                'cdnDomain': '{{ get_cdn_domain() }}',
                'user_id': {{ $currentUser ? $currentUser->id : 0 }},
                'user_avatar': {!! $currentUser ? '"'.$currentUser->present()->gravatar() . '"' : '""' !!},
                'user_link': {!! $currentUser ? '"'. route('users.show', $currentUser->id) . '"' : '""' !!},
                'user_badge': '{{ $currentUser ? ($currentUser->present()->hasBadge() ? $currentUser->present()->badgeName() : '') : '' }}',
                'user_badge_link': "{{ $currentUser ? (route('roles.show', [$currentUser->present()->badgeID()])) : '' }}",
                'routes': {
                    'notificationsCount' : '{{ route('notifications.count') }}',
                    'upload_image' : '{{ route('upload_image') }}'
                },
                'token': '{{ csrf_token() }}',
                'environment': '{{ app()->environment() }}',
                'following_users': [],
                'qa_category_id': '{{ config('phphub.qa_category_id') }}'
            };

			var ShowCrxHint = '{{isset($show_crx_hint) ? $show_crx_hint : 'no'}}';
        </script>


	    @yield('styles')

		<meta http-equiv="x-pjax-version" content="{{ elixir('assets/css/styles.css') }}">




	</head>
	<body id="body" class="{{ route_class() }}">

        {{-- Wechat share cover --}}
        <div style="display: none;"
        　　document.getElementById("typediv1").style.display="none";>
            @section('wechat_icon')
            <img src="https://dn-phphub.qbox.me/uploads/images/201701/29/1/pQimFCe1r5.png">
            @show

        </div>

		<div id="wrap">

			@include('layouts.partials.nav')

			<div class="container main-container {{ (Request::is('blogs*') || Request::is('articles*')) || is_route('wildcard') ? 'blog-container' : '' }}">

				@if(Auth::check() && !Auth::user()->verified && !Request::is('email-verification-required'))
    				<div class="alert alert-warning">
    		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    		            邮箱未激活，请前往 {{ Auth::user()->email }} 查收激活邮件，激活后才能完整地使用社区功能，如发帖和回帖。未收到邮件？请前往 <a href="{{ route('email-verification-required') }}">重发邮件</a> 。
    		        </div>
                @elseif (Auth::check() && empty(Auth::user()->password) )
                    <div class="alert alert-warning">
    		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    		            未设置登录密码，请前往 <a href="{{ route('users.edit_password', [Auth::id()]) }}">修改密码</a> 页面进行设置。设置后将可以在移动设备上使用邮箱登录网站。
    		        </div>
				@endif

				@include('flash::message')

				@yield('content')

			</div>

@include('layouts.partials.footer')

		</div>










	    @yield('scripts')


    <script src="{{ cdn(elixir('assets/js/scripts.js')) }}"></script>

        @if (App::environment() == 'production')
		<script>
          ga('create', '{{ getenv('GA_Tracking_ID') }}', 'auto');
          ga('send', 'pageview');
        </script>


		<script>
		// Baidu link submit
		(function(){
		    var bp = document.createElement('script');
		    var curProtocol = window.location.protocol.split(':')[0];
		    if (curProtocol === 'https') {
		        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
		    }
		    else {
		        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
		    }
		    var s = document.getElementsByTagName("script")[0];
		    s.parentNode.insertBefore(bp, s);
		})();
		</script>
        @endif



	</body>
</html>
