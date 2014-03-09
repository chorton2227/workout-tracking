@extends('layouts.admin')

@section('title')
	@parent | {{{ $title }}}
@stop

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $title }}</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

	@include('partials.alerts.success')

	@include('partials.alerts.error')

	<form method="post" action="@if (isset($user)) {{ URL::to('admin/users/' . $user->id . '/edit') }} @endif" autocomplete="off">

		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

		<!-- Username -->		
		<div class="form-group">

			<label for="username">{{{ Lang::get('user.field.username') }}}</label>
			
			<input type="text" class="form-control" name="username" id="username" value="{{{ Input::old('username', isset($user) ? $user->username : null) }}}" />
				
		</div>

		<!-- Email -->		
		<div class="form-group">

			<label for="email">{{{ Lang::get('user.field.email') }}}</label>
			
			<input type="text" class="form-control" name="email" id="email" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />				
			
		</div>

		<!-- Password -->		
		<div class="form-group">

			<label for="password">{{{ Lang::get('user.field.password') }}}</label>
			
			<input type="password" class="form-control" name="password" id="password" value="{{{ Input::old('password') }}}" />
			
		</div>

		<!-- Password Confirm -->		
		<div class="form-group">

			<label for="password_confirmation">{{{ Lang::get('user.field.password_confirm') }}}</label>
			
			<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" />
			
		</div>

		<!-- Activation Status -->		
		<div class="form-group">

			<label for="confirm">{{{ Lang::get('user.field.confirmed') }}}</label>

			<select class="form-control" {{{ (isset($user) && $user->id === Confide::user()->id ? ' disabled="disabled"' : '') }}} name="confirm" id="confirm">

				<option value="0"{{{ (Input::old('confirm', isset($user) ? $user->confirmed : null) == 0 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.no') }}}</option>

				<option value="1"{{{ (Input::old('confirm', isset($user) ? $user->confirmed : null) == 1 ? ' selected="selected"' : '') }}}>{{{ Lang::get('general.yes') }}}</option>

			</select>
			
		</div>

		<!-- Roles -->		
		<div class="form-group">

			<label for="roles">{{{ Lang::get('user.field.roles') }}}</label>

			<select class="form-control" name="roles[]" id="roles[]" multiple>

				@foreach ($roles as $role)

					<option value="{{{ $role->id }}}"{{{ (in_array($role->id, $selectedRoles) ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>

				@endforeach

			</select>

			<p>{{{ Lang::get('user.admin.select_roles') }}}</p>
			
		</div>

		<button type="submit" class="btn btn-primary">{{ $submitText }}</button>

		<a href="{{{ URL::to('admin/users') }}}" class="btn btn-default">{{{ Lang::get('general.cancel') }}}</a>

	</form>

@stop