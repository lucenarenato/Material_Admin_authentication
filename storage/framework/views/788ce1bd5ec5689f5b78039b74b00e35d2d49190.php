<button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
	<i class="material-icons" role="presentation">arrow_drop_down</i>
	<span class="visuallyhidden">Accounts</span>
</button>

<ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right demo-list-icon mdl-list" for="accbtn">
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="/" title="<?php echo e(trans('titles.home')); ?>">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">home</i>
				<?php echo e(trans('titles.home')); ?>

			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="<?php echo e(url('/profile/'.Auth::user()->name)); ?>" title="<?php echo e(trans('titles.profile')); ?>">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">perm_identity</i>
				<?php echo e(trans('titles.profile')); ?>

			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
  		<a href="<?php echo e(url('/account/')); ?>" title="<?php echo e(trans('titles.account')); ?>">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">account_circle</i>
				<?php echo e(trans('titles.account')); ?>

			</span>
    	</a>
  	</li>
  	<li class="mdl-menu__item mdl-list__item">
		<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="<?php echo e(trans('titles.logout')); ?>">
			<span class="mdl-list__item-primary-content">
				<i class="material-icons mdl-list__item-icon">power_settings_new</i>
				<?php echo e(trans('titles.logout')); ?>

			</span>
		</a>
		<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
		    <?php echo e(csrf_field()); ?>

		</form>
  	</li>
</ul>