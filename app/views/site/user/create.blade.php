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

				<form method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user') }}}" role="form">

					<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

					<div class="form-group">

						<label for="username" class="control-label">{{{ Lang::get('confide::confide.username') }}}</label>

						<input placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" class="form-control" name="username" id="username" value="{{{ Input::old('username') }}}">

					</div>

					<div class="form-group">

						<label for="email" class="control-label">{{{ Lang::get('confide::confide.e_mail') }}}</label>

						<input placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" class="form-control" name="email" id="email" value="{{{ Input::old('email') }}}">
						
					</div>

					<div class="form-group">

						<label for="password" class="control-label">{{{ Lang::get('confide::confide.password') }}}</label>

						<input placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" class="form-control" name="password" id="password">
						
					</div>

					<div class="form-group">

						<label for="password_confirmation" class="control-label">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>

						<input placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" class="form-control" name="password_confirmation" id="password_confirmation">
						
					</div>

					<div class="form-group">

						<button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
						
					</div>

				</form>

			</div>
			
		</div><!--/.row -->

	</div><!--/.container -->

@stop