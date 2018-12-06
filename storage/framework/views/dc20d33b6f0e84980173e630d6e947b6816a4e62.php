<?php $__env->startSection('template_title'); ?>
	Routing Information
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
	Routing Information
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
		<a itemprop="item" href="/routes" disabled>
			<span itemprop="name">
				Routes List
			</span>
		</a>
		<meta itemprop="position" content="2" />
	</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
		<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
			<h2 class="mdl-card__title-text logo-style">
				<?php if(count($routes) === 1): ?>
				    <?php echo e(count($routes)); ?> Route Total
				<?php elseif(count($routes) > 1): ?>
				    <?php echo e(count($routes)); ?> Total Routes
				<?php else: ?>
				    No Routes ?!?
				<?php endif; ?>
			</h2>
		</div>
		<div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
			<div class="table-responsive material-table">
				<table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">URI</th>
							<th class="mdl-data-table__cell--non-numeric">Name</th>
							<th class="mdl-data-table__cell--non-numeric">Prefix</th>
							<th class="mdl-data-table__cell--non-numeric">Method</th>
						</tr>
					</thead>
				  	<tbody>
						<?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="mdl-data-table__cell--non-numeric"><a href="/users"><?php echo e($route->uri); ?></a></td>
								<td class="mdl-data-table__cell--non-numeric"><a href="/users"><?php echo e($route->getName()); ?></a></td>
								<td class="mdl-data-table__cell--non-numeric"><a href="/users"><?php echo e($route->getPrefix()); ?></a></td>
								<td class="mdl-data-table__cell--non-numeric"><a href="/users"><?php echo e($route->getActionMethod()); ?></a></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  	</tbody>
				</table>
			</div>
		</div>
	    <div class="mdl-card__menu" style="top: -5px;">
		    <?php echo $__env->make('partials.mdl-highlighter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		    <?php echo $__env->make('partials.mdl-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
	<?php echo $__env->make('scripts.mdl-datatables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('scripts.highlighter-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>