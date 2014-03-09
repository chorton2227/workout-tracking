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

	<form method="post" action="@if (isset($role)) {{ URL::to('admin/roles/' . $role->id . '/edit') }} @endif" autocomplete="off">

		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

		<!-- Name -->
		<div class="form-group">

			<label for="name">{{{ Lang::get('role.field.name') }}}</label>
			
			<input type="text" class="form-control" name="name" id="name" value="{{{ Input::old('name', isset($role) ? $role->name : null) }}}" />
				
		</div>

		<!-- Permissions -->
		<div class="form-group">

			<h4>{{{ Lang::get('role.field.permissions') }}}</h4>

			@foreach ($permissions as $permission)

				<input type="checkbox" name="permissions[{{{ $permission->id }}}]" id="permissions[{{{ $permission->id }}}]" value="1" {{{ in_array($permission->id, $selectedPermissions) ? 'checked="checked"' : '' }}} />	

				<label for="permissions[{{{ $permission->id }}}]">{{ $permission->display_name }}</label>

			@endforeach
				
		</div>

		<button type="submit" class="btn btn-primary">{{ $submitText }}</button>

		<a href="{{{ URL::to('admin/roles') }}}" class="btn btn-default">{{{ Lang::get('general.cancel') }}}</a>

	</form>

@stop