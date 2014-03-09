@if (Session::get('notice'))

	<div class="alert alert-info alert-dismissable">

		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		{{{ Session::get('notice') }}}

	</div><!--/.alert-info -->

@endif