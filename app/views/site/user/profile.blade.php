@extends('layouts.site')

@section('title')
	@parent | {{ $title }}
@stop

@section('content')

	<div class="container">

		<div class="row">

			<div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">

				<div class="row">

					<div class="col-xs-4 text-center">

						<a href="{{ $profile_image_src }}">

							<img class="img-responsive img-thumbnail" src="{{ $profile_image_src }}" alt="Image of {{ $user->username }}" />

						</a>

					</div>

					<div class="col-xs-8">

						<h1>{{ $user->username }}</h1>

					</div>

				</div><!--/.row -->

			</div>
			
		</div><!--/.row -->

	</div><!--/.container -->
	
@stop