<?php $__env->startSection('template_title'); ?>
    Editing Task
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    Editing Task
<?php $__env->stopSection(); ?>

<?php if($task->completed == '1'): ?>
    <?php
        $breadcrumb_status_link     = '/tasks-complete';
        $breadcrumb_status_title    = 'Complete';
    ?>
<?php elseif($task->completed == '0'): ?>
    <?php
        $breadcrumb_status_link     = '/tasks-incomplete';
        $breadcrumb_status_title    = 'Incomplete';
    ?>
<?php endif; ?>

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
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="<?php echo e($breadcrumb_status_link); ?>">
            <span itemprop="name">
                <?php echo e($breadcrumb_status_title); ?>

            </span>
        </a>
        <i class="material-icons">chevron_right</i>
        <meta itemprop="position" content="3" />
    </li>
    <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="/tasks/<?php echo e($task->id); ?>/edit">
            <span itemprop="name">
                <?php echo e($task->name); ?>

            </span>
        </a>
        <meta itemprop="position" content="4" />
    </li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mdl-grid full-grid margin-top-0 padding-0">
        <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
            <div class="mdl-color--grey-700 mdl-color-text--white mdl-card mdl-shadow--2dp" style="width:100%;" itemscope itemtype="https://schema.org/Person">

                <div class="mdl-card__title mdl-card--expand mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text">
                        <?php echo e($task->name); ?>

                    </h2>
                </div>

                <?php echo Form::model($task, array('action' => array('TasksController@update', $task->id), 'method' => 'PUT', 'role' => 'form')); ?>


                    <div class="mdl-card__supporting-text">
                        <div class="mdl-grid full-grid padding-0">
                            <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                                <div class="mdl-grid ">

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('name') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'mdl-textfield__input mdl-color-text--white')); ?>

                                            <?php echo Form::label('name', 'Task Name', array('class' => 'mdl-textfield__label mdl-color-text--primary'));; ?>

                                            <span class="mdl-textfield__error">Task name is required</span>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth <?php echo e($errors->has('user_level') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::select('completed', array('1' => 'Complete', '0' => 'Incomplete'), $task->completed, array('class' => 'mdl-selectfield__select mdl-textfield__input mdl-color-text--white', 'id' => 'status')); ?>

                                            <label for="completed">
                                                <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                            </label>
                                            <?php echo Form::label('completed', 'Task Status', array('class' => 'mdl-textfield__label mdl-selectfield__label mdl-color-text--primary'));; ?>

                                            <span class="mdl-textfield__error"></span>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('description') ? 'is-invalid' :''); ?>">
                                            <?php echo Form::textarea('description', NULL, array('id' => 'description', 'class' => 'mdl-textfield__input mdl-color-text--white')); ?>

                                            <?php echo Form::label('description', 'Task Description', array('class' => 'mdl-textfield__label mdl-color-text--primary'));; ?>

                                            <span class="mdl-textfield__error"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mdl-card__actions padding-top-0">
                        <div class="mdl-grid padding-top-0">
                            <div class="mdl-cell mdl-cell--12-col padding-top-0 margin-top-0 margin-left-1-1">

                                
                                <span class="save-actions">
                                    <?php echo Form::button('Update Task', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')); ?>

                                </span>

                                
                                <?php echo Form::button('Delete Task', array('class' => 'dialog-button-delete mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--accent mdl-button-colored mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop padding-left-1 padding-right-1 ')); ?>


                            </div>
                        </div>
                    </div>

                    <div class="mdl-card__menu mdl-color-text--white">

                        
                        <span class="save-actions">
                            <?php echo Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button-colored', 'title' => 'Update Task')); ?>

                        </span>

                        
                        <a href="#" class="dialog-button-delete-icon dialiog-trigger-delete dialiog-trigger<?php echo e($task->id); ?> mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-taskid="<?php echo e($task->id); ?>" title="Delete Task">
                            <i class="material-icons">delete</i>
                        </a>

                    </div>

                    <?php echo $__env->make('dialogs.dialog-save', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo Form::close(); ?>


                <?php echo Form::open(array('class' => '', 'id' => 'delete', 'method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <?php echo $__env->make('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Task Deletion', 'dialogSaveBtnText' => 'Delete'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::close(); ?>


            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php echo $__env->make('scripts.mdl-required-input-fix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script type="text/javascript">
        mdl_dialog('.dialog-button-save');
        mdl_dialog('.dialog-button-icon-save');
        mdl_dialog('.dialog-button-delete','.dialog-delete-close','#dialog_delete');
        mdl_dialog('.dialog-button-delete-icon','.dialog-delete-close','#dialog_delete');
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>