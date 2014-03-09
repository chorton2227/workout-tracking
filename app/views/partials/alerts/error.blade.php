@if (Session::get('error'))

	<div class="alert alert-danger alert-dismissable">

		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		@if (is_array(Session::get('error')))

			{{ head(Session::get('error')) }}

		@else

			{{{ Session::get('error') }}}

		@endif

	</div><!--/.alert-danger -->

@endif