@extends('layouts.site')

@section('title')
	@parent | {{{ Lang::get('error.500.title') }}}
@stop

@section('content')

	<div class="container">

		<div class="row">

			<div class="col-xs-12">

				<h1>{{{ Lang::get('error.500.title') }}}</h1>

				<p>{{ Lang::get('error.500.description', array('homepage_link' => URL::to('/'))) }}</p>

			</div>

		</div><!--/.row -->

	</div><!--/.container -->

@stop