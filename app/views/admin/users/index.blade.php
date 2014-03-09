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
				<a href="{{{ URL::to('admin/users/create') }}}" class="btn btn-primary">
					<i class="fa fa-plus"></i>
					{{{ Lang::get('general.create') }}}
				</a>
			</p>

			<div class="table-responsive">
				<table id="data-table" class="table table-striped table-bordered table-hover">

					<thead>
						<tr>
							<th width="150">{{{ Lang::get('user.field.username') }}}</th>
							<th width="200">{{{ Lang::get('user.field.email') }}}</th>
							<th width="150">{{{ Lang::get('user.field.roles') }}}</th>
							<th width="100">{{{ Lang::get('user.field.confirmed') }}}</th>
							<th width="200">{{{ Lang::get('user.field.created_at') }}}</th>
							<th width="200">{{{ Lang::get('general.actions') }}}</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($users as $user): ?>
							<?php $role_text = ''; ?>
							<tr>
								<td><?php echo $user->username; ?></td>
								<td><?php echo $user->email; ?></td>
								<td>
									<?php $role_count = 0; foreach ($user->roles as $role) : ?>
										<?php if ($role_count != 0) $role_text .= ', '; ?>
										<?php $role_text .= $role->name; ?>
									<?php $role_count++; endforeach; ?>
									{{ $role_text }}
								</td>
								<td>
									<?php if ($user->confirmed) : ?>
										{{{ Lang::get('general.yes') }}}
									<?php else : ?>
										{{{ Lang::get('general.no') }}}
									<?php endif; ?>
								</td>
								<td><?php echo $user->created_at; ?></td>
								<td>
									<a href="{{{ URL::to('admin/users/' . $user->id . '/edit') }}}">
										<i class="fi-pencil"></i>
										{{{ Lang::get('general.edit') }}}
									</a>

									&nbsp;

									<a href="{{{ URL::to('admin/users/' . $user->id . '/delete') }}}">
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