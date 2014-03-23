@extends('layouts.site')

@section('title')
	@parent | {{ $title }}
@stop

@section('header')
	<link href="{{ URL::asset('assets/plugins/data-tables/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('footer')
	<script src="{{ URL::asset('assets/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/data-tables/js/dataTables.bootstrap.js') }}"></script>
	<script>
		$(document).ready(function() {
			var weightLogTable = $('#weight-log-table').dataTable({
				"bFilter" : false,
				"bLengthChange" : false,
				"aoColumns" : [
					null,
					{ "bSortable": false },
					{ "bSortable": false }
				],
				"sDom": "<'row'r>"+"t"+"<'row text-center'<'col-xs-12'i><'col-xs-12'p>>"
			});
			weightLogTable.fnSort( [ [0,'desc'] ] );
		});
	</script>
@stop

@section('content')

	<div class="container">

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

	</div><!--/.container -->

	<div class="container">

		<div class="row">

			<div class="col-md-5">

				<div class="panel panel-default">

					<div class="panel-heading">Weight Log Entries</div>
					
					<table id="weight-log-table" class="table table-striped">
						<thead>
							<tr>
								<th>Date</th>
								<th>Weight</th>
								<th>+/-</th>
							</tr>
						</thead>

						<tbody>
							@for ($i = 0; $i < count($weight_logs); $i++)
								<tr>
									<td>{{ $weight_logs[$i]->weigh_date }}</td>
									<td>{{ $weight_logs[$i]->weight }} lb</td>
									<td>
										@if ($i + 1 < count($weight_logs))
											{{ $weight_logs[$i]->weight - $weight_logs[$i + 1]->weight }} lb
										@else
										@endif
									</td>
								</tr>
							@endfor
						</tbody>
					</table>

				</div><!--/.panel -->

			</div><!--/.col-md-5 -->
			
		</div><!--/.row -->

	</div><!--/.container -->
	
@stop