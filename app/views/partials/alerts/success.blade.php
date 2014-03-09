@if (Session::get('success'))

	<div class="alert alert-success alert-dismissable">

		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		{{{ Session::get('success') }}}

	</div><!--/.alert-success -->

@endif