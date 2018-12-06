<?php $__env->startSection('template_title'); ?>
    Welcome <?php echo e(Auth::user()->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	<?php echo e(trans('auth.loggedIn', ['name' => Auth::user()->name])); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>

	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" href="<?php echo e(url('/')); ?>">
			<span itemprop="name">
				<?php echo e(trans('titles.app')); ?>

			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>
	<li class="active">
		<?php echo e(trans('titles.dashboard')); ?>

	</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="mdl-grid margin-top-0-important padding-top-0-important">

		<div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell margin-top-0-important mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--8-col-desktop">
			<?php echo $__env->make('panels.welcome-panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>

		<?php echo $__env->make('cards.weather-card', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<div class="mdl-cell mdl-shadow--2dp mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-desktop mdl-color--primary mdl-card dark-table">

			<?php echo $__env->make('cards.check-list-card', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		</div>

		

	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>