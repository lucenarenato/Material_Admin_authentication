<?php echo Form::model(new App\Models\Task, ['route' => ['tasks.store'], 'class'=>'', 'role' => 'form']); ?>


    <div class="mdl-card__supporting-text">
        <div class="mdl-grid full-grid padding-0">
            <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('name') ? 'is-invalid' :''); ?>">
                            <?php echo Form::text('name', NULL, array('id' => 'task-name', 'class' => 'mdl-textfield__input mdl-color-text--white')); ?>

                            <?php echo Form::label('name', 'Task Name', array('class' => 'mdl-textfield__label mdl-color-text--white'));; ?>

                            <span class="mdl-textfield__error">Task name is required</span>
                        </div>
                    </div>

                    

                    <div class="mdl-cell mdl-cell--12-col-tablet mdl-cell--12-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('description') ? 'is-invalid' :''); ?>">
                            <?php echo Form::textarea('description', NULL, array('id' => 'task-description', 'class' => 'mdl-textfield__input mdl-color-text--white')); ?>

                            <?php echo Form::label('description', 'Task Description', array('class' => 'mdl-textfield__label mdl-color-text--white'));; ?>

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
                    <?php echo Form::button('Create Task', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--primary mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')); ?>

                </span>

            </div>
        </div>
    </div>

    <div class="mdl-card__menu mdl-color-text--white">

        <span class="save-actions">
            <?php echo Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button-colored', 'title' => 'Update Task')); ?>

        </span>

    </div>

    <?php echo $__env->make('dialogs.dialog-save', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>