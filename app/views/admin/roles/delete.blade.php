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

	<form method="post" action="" autocomplete="off">

		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

		<input type="hidden" name="id" value="{{{ $role->id }}}" />

		<p>{{{ Lang::get('form.delete.are_you_sure', array('resource' => Lang::get('role.resource.singular.lowercase'), 'name' => $role->name)) }}}</p>

		<a href="{{{ URL::to('admin/roles') }}}" class="btn btn-default">{{{ Lang::get('general.cancel') }}}</a>

		<button type="submit" class="btn btn-danger">{{{ Lang::get('general.delete') }}}</button>

	</form>

@stop