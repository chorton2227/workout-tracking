@extends('layouts.admin')

@section('title')
	@parent | {{ $title }}
@stop

@section('header')
	<link href="{{ URL::asset('assets/sb-admin-v2/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('footer')
	<script src="{{ URL::asset('assets/sb-admin-v2/js/plugins/dataTables/jquery.dataTables.js') }}"></script>
	<script src="{{ URL::asset('assets/sb-admin-v2/js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#data-table').dataTable();
		});
	</script>
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

	<div class="row">
		<div class="col-lg-12">
			<p>
				<a href="{{{ URL::to('admin/roles/create') }}}" class="btn btn-primary">
					<i class="fa fa-plus"></i>
					{{{ Lang::get('general.create') }}}
				</a>
			</p>

			<div class="table-responsive">
				<table id="data-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th width="250">{{{ Lang::get('role.field.name') }}}</th>
							<th width="250">{{{ Lang::get('role.field.num_users') }}}</th>
							<th width="250">{{{ Lang::get('role.field.created_at') }}}</th>
							<th width="220">{{{ Lang::get('general.actions') }}}</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($roles as $role): ?>
							<?php $user_text = ''; ?>
							<tr>
								<td><?php echo $role->name; ?></td>
								<td>{{ count($role->users) }}</td>
								<td><?php echo $role->created_at; ?></td>
								<td>
									<a href="{{{ URL::to('admin/roles/' . $role->id . '/edit') }}}">
										<i class="fi-pencil"></i>
										{{{ Lang::get('general.edit') }}}
									</a>
									&nbsp;
									<a href="{{{ URL::to('admin/roles/' . $role->id . '/delete') }}}">
										<i class="fi-trash"></i>
										{{{ Lang::get('general.delete') }}}
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

@stop