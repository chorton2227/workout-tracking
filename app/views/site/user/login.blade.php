@extends('layouts.site')

@section('title')
	@parent | {{ $title }}
@stop

@section('content')

	<div class="container">

		<div class="row">

			<div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">

				<div class="row">

					<div class="col-xs-12 text-center">

						<h1>{{ $title }}</h1>

					</div>

				</div><!--/.row -->

				@include('partials.alerts.error')

				@include('partials.alerts.notice')

				<form method="POST" action="{{ Confide::checkAction('UserController@do_login') ?: URL::to('/user/login') }}" role="form">

					<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

					<div class="form-group">

						<label for="email" class="control-label">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>

						<input placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" class="form-control" name="email" id="email" value="{{{ Input::old('email') }}}">
						
					</div>

					<div class="form-group">

						<label for="password" class="control-label">{{{ Lang::get('confide::confide.password') }}}</label>

						<input placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" class="form-control" name="password" id="password">
						
					</div>

					<div class="form-group">

						<input type="hidden" name="remember" value="0">

						<div class="checkbox">

							<label>

								<input type="checkbox" name="remember" id="remember" value="1">

								{{{ Lang::get('confide::confide.login.remember') }}}

							</label>

						</div>

					</div>

					<div class="form-group">

						<button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.login.submit') }}}</button>

						<a class="btn btn-default" href="{{{ (Confide::checkAction('UserController@create')) ?: 'create' }}}">{{{ Lang::get('user.site.register') }}}</a>

					</div>

					<div class="form-group">

						<a href="{{{ (Confide::checkAction('UserController@forgot_password')) ?: 'forgot' }}}">{{{ Lang::get('user.site.login_forgot_password') }}}</a>

					</div>

				</form>

			</div>
			
		</div><!--/.row -->

	</div><!--/.container -->
	
@stop