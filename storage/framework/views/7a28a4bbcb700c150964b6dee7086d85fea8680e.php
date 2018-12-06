<?php
	$user = Auth::user();
	if ($user->profile->avatar_status == 1) {
		$userGravImage = $user->profile->avatar;
	} else {
		$userGravImage = Gravatar::get($user->email);
	}
?>
<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
	<a href="/" class="dashboard-logo mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white">
		Laravel
			<i class="material-icons " role="presentation">whatshot</i>
		Material
	</a>
	<header class="demo-drawer-header">
		<img id="drawer_avatar" src="<?php echo e($userGravImage); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="demo-avatar mdl-list__item-avatar">
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
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>
			<?php echo e(Lang::get('titles.home')); ?>

		</a>
		<a class="mdl-navigation__link <?php echo e(Request::is('profile/'.Auth::user()->name) ? 'mdl-navigation__link--current' : null); ?>" href="<?php echo e(url('/profile/'.Auth::user()->name)); ?>">
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person</i>
			<?php echo e(Lang::get('titles.profile')); ?>

		</a>
		<a class="mdl-navigation__link <?php echo e(Request::is('tasks') ? 'mdl-navigation__link--current' : null); ?>" href="/tasks">
			<i class="material-icons mdl-badge mdl-badge--overlap" <?php if(count($incompleteTasks) != 0): ?> data-badge="<?php echo e(count($incompleteTasks)); ?>" <?php endif; ?> role="presentation">view_list</i>
			My Tasks
		</a>
		<a class="mdl-navigation__link <?php echo e(Request::is('tasks/create') ? 'mdl-navigation__link--current' : null); ?>" href="/tasks/create">
			<i class="material-icons mdl-badge mdl-badge--overlap" role="presentation">playlist_add</i>
			Create Task
		</a>
		<?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
			<a class="mdl-navigation__link <?php echo e((Request::is('users') || Request::is('users/create') || Request::is('users/deleted')) ? 'mdl-navigation__link--current' : null); ?>" href="<?php echo e(url('/users')); ?>">
				<i class="mdl-color-text--blue-grey-400 material-icons mdl-badge mdl-badge--overlap" data-badge="<?php echo e($totalUsers); ?>" role="presentation">contacts</i>
				<?php echo e(Lang::get('titles.adminUserList')); ?>

			</a>
			
			<a class="mdl-navigation__link <?php echo e(Request::is('themes') ? 'mdl-navigation__link--current' : null); ?>" href="<?php echo e(url('/themes')); ?>">
				<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">invert_colors</i>
				<?php echo e(Lang::get('titles.adminThemesList')); ?>

			</a>
			<a class="mdl-navigation__link <?php echo e(Request::is('logs') ? 'mdl-navigation__link--current' : null); ?>" href="<?php echo e(url('/logs')); ?>">
				<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">bug_report</i>
				<?php echo e(Lang::get('titles.adminLogs')); ?>

			</a>
			<a class="mdl-navigation__link <?php echo e(Request::is('php') ? 'mdl-navigation__link--current' : null); ?>" href="<?php echo e(url('/php')); ?>">
				<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">info</i>
				<?php echo e(Lang::get('titles.adminPHP')); ?>

			</a>
			<a class="mdl-navigation__link <?php echo e(Request::is('routes') ? 'mdl-navigation__link--current' : null); ?>" href="<?php echo e(url('/routes')); ?>">
				<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">settings_ethernet</i>
				<?php echo e(Lang::get('titles.adminRoutes')); ?>

			</a>
		<?php endif; ?>

		<div class="mdl-layout-spacer"></div>

		<a class="mdl-navigation__link" href="https://github.com/jeremykenedy/laravel-material-design" target="_blank">
			<i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i>
			<span class="visuallyhidden">Help</span>
		</a>
	</nav>
</div>