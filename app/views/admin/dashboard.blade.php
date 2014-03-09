@extends('layouts.admin')

@section('title')
	@parent | {{ $title }}
@stop

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $title }}</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-bars fa-fw"></i> Lorem ipsum
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor interdum sem, ac congue odio vestibulum in. Nulla pulvinar orci non eros tincidunt auctor. Phasellus posuere dolor id rhoncus congue. Praesent pellentesque nisi sed volutpat sodales. Phasellus eget mauris sagittis, aliquet mi vitae, pharetra eros. Donec nec vestibulum nibh, vitae convallis lacus. In rutrum erat ut nibh tristique pellentesque. Vestibulum velit augue, pulvinar ac lorem eu, molestie dignissim erat. In magna eros, lobortis sit amet enim vitae, aliquet rhoncus nunc. Suspendisse placerat sit amet purus et pretium. Aliquam ut velit velit. Donec porttitor, tortor ac sodales euismod, leo lacus viverra sapien.</p>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-md-6 -->
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-user fa-fw"></i> {{{ Lang::get('admin.widgets.new_users.title') }}}
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th width="150">{{{ Lang::get('user.field.username') }}}</th>
									<th width="200">{{{ Lang::get('user.field.created_at') }}}</th>
								</tr>
							</thead>

							<tbody>
								<?php foreach ($users as $user): ?>
									<tr>
										<td><a href="{{{ URL::to('admin/users/'.$user->id.'/edit')}}}">{{ $user->username }}<a href=""></td>
										<td>{{{ $user->getJoinDate() }}}</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-md-6 -->
	</div>
	<!-- /.row -->

@stop