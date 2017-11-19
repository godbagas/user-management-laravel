<?php 
	$user = Auth::user();
	if ($user->profile->avatar_status == 1) {
		$userGravImage = $user->profile->avatar;
	} else {
		$userGravImage = Gravatar::get($user->email);
	}
 ?>
<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
	<a href="/" class="dashboard-logo mdl-button mdl-js-button mdl-js-ripple-effect diagmonds-bg mdl-color-text--white">
		TM
		Technology
	</a>
	<header class="demo-drawer-header">
		<img id="drawer_avatar" src="<?php echo e(asset('images/spiderman_avatar.png')); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="demo-avatar mdl-list__item-avatar">
		<span itemprop="image" style="display:none;"><?php echo e(Gravatar::get(Auth::user()->email)); ?></span>
		<!-- <i class="material-icons mdl-list__item-avatar">face</i> -->
		<div class="demo-avatar-dropdown">
			<span>
				<?php echo e(Auth::user()->name); ?>

			</span>
			<div class="mdl-layout-spacer"></div>
			<?php echo $__env->make('partials.account-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</header>
	<nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
		<a class="mdl-navigation__link <?php echo e(Request::is('/') ? 'mdl-navigation__link--current' : null); ?>" href="/" title="<?php echo e(Lang::get('titles.home')); ?>">
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">desktop_mac</i>
			<?php echo e(Lang::get('titles.home')); ?>

		</a>
		<a class="mdl-navigation__link <?php echo e(Request::is('profile/'.Auth::user()->name) ? 'mdl-navigation__link--current' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name)); ?>">
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person</i>
			<?php echo e(Lang::get('titles.profile')); ?>

		</a>
		<?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
			<a class="mdl-navigation__link <?php echo e((Request::is('users') || Request::is('users/create') || Request::is('users/deleted')) ? 'mdl-navigation__link--current' : null); ?>" href="<?php echo e(url('/users')); ?>">
				<i class="mdl-color-text--blue-grey-400 material-icons mdl-badge mdl-badge--overlap" data-badge="<?php echo e($totalUsers); ?>" role="presentation">contacts</i>
				<?php echo e(Lang::get('titles.adminUserList')); ?>

			</a>
			
		<?php endif; ?>
	</nav>
</div>
