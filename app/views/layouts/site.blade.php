<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>
			@section('title')
			{{{ Lang::get('site.title') }}}
			@show
		</title>

		<link rel="stylesheet" href="{{ URL::asset('assets/css/site.css') }}" />
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		@section('header')
		@show
	</head>

	<body>

		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

			<div class="container">

				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">{{{ Lang::get('site.navigation.toggle') }}}</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="{{ URL::to('/') }}">{{{ Lang::get('site.title') }}}</a>

				</div><!--/.navbar-header -->

				<div class="navbar-collapse collapse">

					<ul class="nav navbar-nav navbar-right">

						@if (Auth::check())

							@include('partials.navigation.profile')

						@else

							<li {{ (Request::is('user/login') ? ' class="active"' : '') }}>
								<a href="{{{ URL::to('user/login') }}}">{{{ Lang::get('site.navigation.login') }}}</a>
							</li>

							<li {{ (Request::is('user/create') ? ' class="active"' : '') }}>
								<a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.navigation.signup') }}}</a>
							</li>

						@endif

					</ul><!--/.nav -->

				</div><!--/.navbar-collapse -->

			</div><!--/.container -->

		</div><!--/.navbar -->

		@yield('content')

		<div class="container">

			<hr>

			<footer>

				<p>{{{ Lang::get('site.copyright') }}}</p>

			</footer>

		</div> <!-- /container -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="{{ URL::asset('assets/js/site.js') }}"></script>

		@section('footer')
		@show

	</body>

</html>