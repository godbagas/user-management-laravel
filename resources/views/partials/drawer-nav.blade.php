@php
	$user = Auth::user();
	if ($user->profile->avatar_status == 1) {
		$userGravImage = $user->profile->avatar;
	} else {
		$userGravImage = Gravatar::get($user->email);
	}
@endphp
<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
	<a href="/" class="dashboard-logo mdl-button mdl-js-button mdl-js-ripple-effect diagmonds-bg mdl-color-text--white">
		TM
		Technology
	</a>
	<header class="demo-drawer-header">
		<img id="drawer_avatar" src="{{ asset('images/spiderman_avatar.png') }}" alt="{{ Auth::user()->name }}" class="demo-avatar mdl-list__item-avatar">
		<span itemprop="image" style="display:none;">{{ Gravatar::get(Auth::user()->email) }}</span>
		<!-- <i class="material-icons mdl-list__item-avatar">face</i> -->
		<div class="demo-avatar-dropdown">
			<span>
				{{ Auth::user()->name }}
			</span>
			<div class="mdl-layout-spacer"></div>
			@include('partials.account-nav')
		</div>
	</header>
	<nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
		<a class="mdl-navigation__link {{ Request::is('/') ? 'mdl-navigation__link--current' : null }}" href="/" title="{{ Lang::get('titles.home') }}">
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">desktop_mac</i>
			{{ Lang::get('titles.home') }}
		</a>
		<a class="mdl-navigation__link {{ Request::is('profile/'.Auth::user()->name) ? 'mdl-navigation__link--current' : null }}" href="{{ url('/profile/'.Auth::user()->name) }}">
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person</i>
			{{ Lang::get('titles.profile') }}
		</a>
		@role('admin')
			<a class="mdl-navigation__link {{ (Request::is('users') || Request::is('users/create') || Request::is('users/deleted')) ? 'mdl-navigation__link--current' : null }}" href="{{ url('/users') }}">
				<i class="mdl-color-text--blue-grey-400 material-icons mdl-badge mdl-badge--overlap" data-badge="{{ $totalUsers }}" role="presentation">contacts</i>
				{{ Lang::get('titles.adminUserList') }}
			</a>
			{{--
				<a class="mdl-navigation__link {{ Request::is('users/create') ? 'mdl-navigation__link--current' : null }}" href="{{ url('/users/create') }}">
					<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person_add</i>
					{{ Lang::get('titles.adminNewUser') }}
				</a>
			--}}
		@endrole
	</nav>
</div>
