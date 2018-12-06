<?php $__env->startSection('template_title'); ?>
	PHP Information
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	PHP Information
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
	<li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a itemprop="item" href="/php" disabled>
			<span itemprop="name">
				PHP Information
			</span>
		</a>
		<meta itemprop="position" content="2" />
	</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
		<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
			<h2 class="mdl-card__title-text logo-style">
				PHP Details
			</h2>
		</div>
		<div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0">
			<div class="material-table php-info-table context" id="search_table">
				<?php
					ob_start();
					phpinfo();
					$pinfo = ob_get_contents();
					ob_end_clean();
					$pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);
					echo $pinfo;
				?>
			</div>
		</div>
	    <div class="mdl-card__menu" style="top: -3px;">
			<?php echo $__env->make('partials.mdl-highlighter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php echo $__env->make('partials.mdl-filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
	<?php echo $__env->make('scripts.mdl-datatables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.highlighter-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.filter-data-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>