<?php $__env->startSection('template_title'); ?>
	<?php echo e($user->name); ?>'s Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>

	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	<small>
		<?php echo e(trans('profile.showProfileTitle',['username' => $user->name])); ?>

	</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<a itemprop="item" href="<?php echo e(url('/')); ?>">
			<span itemprop="name">
				<?php echo e(trans('titles.app')); ?>

			</span>
		</a>
		<i class="material-icons">chevron_right</i>
		<meta itemprop="position" content="1" />
	</li>

	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
		<a itemprop="item" href="<?php echo e(url('/profile/'.Auth::user()->name)); ?>" class="hidden">
			<span itemprop="name">
				<?php echo e(trans('titles.profile')); ?>

			</span>
		</a>
		<?php echo e(trans('titles.profile')); ?>

		<meta itemprop="position" content="2" />
	</li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('cards.user-profile-card', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

	<?php echo $__env->make('scripts.google-maps-geocode-and-map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>