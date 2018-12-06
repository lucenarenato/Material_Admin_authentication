<?php $__env->startSection('template_title'); ?>
    Create New Task
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    Create New Task
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
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/tasks">
            <span itemprop="name">
                My Tasks
            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="2" />
    </li>
    <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/tasks/create">
            <span itemprop="name">
                Create New Task
            </span>
        </a>
        <meta itemprop="position" content="3" />
    </li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
            <div class="mdl-color--grey-700 mdl-color-text--white mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">
                        Create New Task
                    </h2>
                </div>

                <?php echo $__env->make('tasks.partials.create-task', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.mdl-required-input-fix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script type="text/javascript">
        mdl_dialog('.dialog-button-save');
        mdl_dialog('.dialog-button-icon-save');
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>