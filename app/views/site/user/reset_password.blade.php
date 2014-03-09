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

				<form method="POST" action="{{{ (Confide::checkAction('UserController@do_reset_password'))	?: URL::to('/user/reset') }}}" role="form">

					<input type="hidden" name="token" value="{{{ $token }}}">

					<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

					<div class="form-group">

						<label for="password" class="control-label">{{{ Lang::get('confide::confide.password') }}}</label>

						<input placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" class="form-control" name="password" id="password">

					</div>

					<div class="form-group">

						<label for="password_confirmation" class="control-label">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>

						<input placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" class="form-control" name="password_confirmation" id="password_confirmation">

					</div>

					<div class="form-group">

						<button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
						
					</div>

				</form>

			</div>
			
		</div><!--/.row -->

	</div><!--/.container -->

@stop