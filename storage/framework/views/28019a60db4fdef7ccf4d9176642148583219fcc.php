<?php $__env->startSection('template_title'); ?>
    My Task List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    My Tasks
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
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
        <a itemprop="item" href="" class="">
            <span itemprop="name">
                My Tasks
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if(count($tasks) > 0): ?>

        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">

            <div class="mdl-tabs__tab-bar">
                <a href="#all" class="mdl-tabs__tab is-active">All</a>
                <a href="#incomplete" class="mdl-tabs__tab">Incomplete</a>
                <a href="#complete" class="mdl-tabs__tab">Complete</a>
            </div>

            <?php echo $__env->make('tasks/partials/task-tab', ['tab' => 'all', 'tasks' => $tasks, 'title' => 'All Tasks', 'status' => 'is-active'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('tasks/partials/task-tab', ['tab' => 'incomplete', 'tasks' => $tasksInComplete, 'title' => 'Incomplete Tasks'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('tasks/partials/task-tab', ['tab' => 'complete', 'tasks' => $tasksComplete, 'title' => 'Complete Tasks'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

        <?php echo $__env->make('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Task Deletion', 'dialogSaveBtnText' => 'Delete'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php else: ?>

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
            <div class="mdl-color--grey-700 mdl-color-text--white mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h4 class="mdl-card__title-text">
                        Start by creating a task
                    </h4>
                </div>

                <?php echo $__env->make('tasks.partials.create-task', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
        </div>
    </div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php if(count($tasks) > 0): ?>

        <?php echo $__env->make('scripts.mdl-datatables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script type="text/javascript">

            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                mdl_dialog('.dialiog-trigger<?php echo e($task->id); ?>','','#dialog_delete');
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            var taskId;

            $('.dialiog-trigger-delete').click(function(event) {
                event.preventDefault();
                taskId = $(this).attr('data-taskid');
            });

            $('#confirm').click(function(event) {
                $('form#delete_'+taskId).submit();
            });

        </script>

    <?php else: ?>

    <?php echo $__env->make('scripts.mdl-required-input-fix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <script type="text/javascript">
            mdl_dialog('.dialog-button-save');
            mdl_dialog('.dialog-button-icon-save');
        </script>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>