<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>
			@section('title')
			{{{ Lang::get('site.title') }}}
			@show
		</title>
		<link href="{{ URL::asset('assets/plugins/sb-admin-v2/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/plugins/sb-admin-v2//font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/plugins/sb-admin-v2/css/sb-admin.css') }}" rel="stylesheet">
		@section('header')
		@show
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">{{{ Lang::get('site.navigation.toggle') }}}</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{{ URL::to('/') }}}">{{{ Lang::get('site.title') }}}</a>
				</div>
				<!-- /.navbar-header -->
				<ul class="nav navbar-top-links navbar-right">
					@include('partials.navigation.profile')
				</ul>
				<!-- /.navbar-top-links -->
			</nav>
			<!-- /.navbar-static-top -->
			<nav class="navbar-default navbar-static-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="side-menu">
						<li>
							<a href="{{{ URL::to('admin') }}}"><i class="fa fa-dashboard fa-fw"></i> {{{ Lang::get('admin.navigation.dashboard') }}}</a>
						</li>
						<li>
							<a href="{{{ URL::to('admin/users') }}}">
								<i class="fa fa-users fa-fw"></i>
								{{{ Lang::get('admin.navigation.resource.manage', array('resource' => Lang::get('user.resource.singular.uppercase'))) }}}
							</a>
						</li>
						<li>
							<a href="{{{ URL::to('admin/roles') }}}">
								<i class="fa fa-book fa-fw"></i>
								{{{ Lang::get('admin.navigation.resource.manage', array('resource' => Lang::get('role.resource.singular.uppercase'))) }}}
							</a>
						</li>
					</ul>
					<!-- /#side-menu -->
				</div>
				<!-- /.sidebar-collapse -->
			</nav>
			<!-- /.navbar-static-side -->
			<div id="page-wrapper">
				@yield('content')
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->

		<script src="{{ URL::asset('assets/plugins/sb-admin-v2/js/jquery-1.10.2.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/sb-admin-v2/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/sb-admin-v2/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/sb-admin-v2/js/sb-admin.js') }}"></script>

		@section('footer')
		@show
	</body>
</html>
