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
			/*
			 * Weight Log
			 */
			var weightLogTable = $('#weight-log-table').dataTable({
				"bFilter" : false,
				"bLengthChange" : false,
				"aoColumns" : [
					null,
					{ "bSortable": false },
					{ "bSortable": false }
				],
				"sDom": "<'row'r>"+"t"+"<'panel-footer'<'row text-center'<'col-xs-12'i><'col-xs-12'p>>>"
			});
			weightLogTable.fnSort([[0,'desc']]); // Sort by Date

			/*
			 * Workout
			 */
			var nCloneTh = document.createElement('th');
			var nCloneTd = document.createElement('td');
			nCloneTd.innerHTML = '<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus"></span></button>';
			nCloneTd.className = 'text-center';

			$('#workout-log-table thead tr').each(function () {
				this.insertBefore(nCloneTh, this.childNodes[0]);
			});

			$('#workout-log-table tbody tr').each(function () {
				this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
			});

			var workoutTable = $('#workout-log-table').dataTable({
				"bFilter" : false,
				"bLengthChange" : false,
				"aoColumns" : [
					{ "bSortable": false },
					null,
					{ "bSortable": false },
					{ "bVisible": false }
				],
				"sDom": "<'row'r>"+"t"+"<'panel-footer'<'row text-center'<'col-xs-12'i><'col-xs-12'p>>>"
			});
			workoutTable.fnSort([[1,'asc']]); // Sort by Name

			$('#workout-log-table tbody td').on('click', 'button', function () {
				var nTr = $(this).parents('tr')[0];

				if (workoutTable.fnIsOpen(nTr))
				{
					/* This row is already open - close it */
					$(this).find('.glyphicon').addClass('glyphicon-plus');
					$(this).find('.glyphicon').removeClass('glyphicon-minus');
					workoutTable.fnClose(nTr);
				}
				else
				{
					/* Open this row */
					$(this).find('.glyphicon').addClass('glyphicon-minus');
					$(this).find('.glyphicon').removeClass('glyphicon-plus');
					workoutTable.fnOpen(nTr, fnFormatDetails(workoutTable, nTr), 'details');
				}
			});
		});

		/* Formating function for row details */
		function fnFormatDetails(oTable, nTr)
		{
			var aData = oTable.fnGetData(nTr);
			var sOut = aData[3];

			return sOut;
		}
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

			<div class="col-md-7">

				<div class="panel panel-default">

					<div class="panel-heading">Workout Entries</div>
					
					<table id="workout-log-table" class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Actions</th>
								<th>Exercises</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($routines as $routine)
								<tr>
									<td>{{ $routine->name }}</td>
									<td>
										<a class="btn btn-primary btn-sm">Start Workout</a>
										<a class="btn btn-default btn-sm">Edit</a>
										<a class="btn btn-danger btn-sm">Delete</a>
									</td>
									<td>
										<dl>
											@foreach ($routine->exercises as $exercise)
												<dt>{{ $exercise->name }}</dt>
												<dd>{{ $exercise->description }}</dd>
											@endforeach
										</dl>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				</div><!--/.panel -->

			</div><!--/.col-md-7 -->
			
		</div><!--/.row -->

	</div><!--/.container -->
	
@stop