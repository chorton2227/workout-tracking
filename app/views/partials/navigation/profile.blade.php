@if (Auth::check())

	<li class="dropdown user-dropdown">

		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<img src="{{ Gravatar::src(Auth::user()->email, 20) }}" class="img-rounded" /> {{ Auth::user()->username }} <b class="caret"></b>
		</a>

		<ul class="dropdown-menu">

			@if (Auth::user()->hasRole('admin'))

				<li>
					<a href="{{{ URL::to('admin') }}}">
						<span class="glyphicon glyphicon-wrench"></span> {{{ Lang::get('site.navigation.admin') }}}
					</a>
				</li>

				<li class="divider"></li>

			@endif

			<li>
				<a href="{{{ URL::to('profile/'. Auth::user()->username) }}}">
					<span class="glyphicon glyphicon-user"></span> {{{ Lang::get('site.navigation.profile') }}}
				</a>
			</li>

			<li>
				<a href="{{{ URL::to('user/logout') }}}">
					<span class="glyphicon glyphicon-off"></span> {{{ Lang::get('site.navigation.logout') }}}
				</a>
			</li>

		</ul><!--/.dropdown-menu -->

	</li><!--/.dropdown -->

@endif