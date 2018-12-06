<tr>
    <td>
        <?php echo Form::model($task, array('action' => ['TasksController@update', $task->id], 'method' => 'PUT', 'class'=>'form-inline', 'role' => 'form')); ?>

            <label for="completed-<?php echo e($task->id); ?>" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                <?php echo Form::hidden('name', $task->name, ['id' => 'task-name-'.$task->name]); ?>

                <?php echo Form::hidden('description', $task->description, ['id' => 'task-description-'.$task->id]); ?>

                <?php echo Form::checkbox('completed', 1, $task->completed, ['id' => 'completed-'.$task->id, 'class' => 'mdl-checkbox__input','onClick' => 'this.form.submit()']); ?>

                <span class="mdl-checkbox__label sr-only">Complete Task</span>
            </label>
        <?php echo Form::close(); ?>

    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        <?php echo e($task->id); ?>

    </td>

    <td class="mdl-data-table__cell--non-numeric">
        <?php echo e($task->name); ?>

    </td>

    <td class="mdl-data-table__cell--non-numeric hide-mobile">
        <?php echo e($task->description); ?>

    </td>

    <td class="mdl-data-table__cell--non-numeric">
        <?php if($task->completed === 1): ?>
            <span class="badge mdl-color--green-400 mdl-color-text--white">
                Complete
            </span>
        <?php else: ?>
            <span class="badge mdl-color--red-400 mdl-color-text--white">
                Incomplete
            </span>
        <?php endif; ?>
    </td>

    <td class="mdl-data-table__cell--non-numeric">
        <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons mdl-color-text--white">edit</i>
            <span class="sr-only">Edit Task</span>
        </a>
        <?php echo Form::open(array('class' => 'inline-block', 'id' => 'delete_'.$task->id, 'method' => 'DELETE', 'route' => array('tasks.destroy', $task->id))); ?>

            <?php echo e(method_field('DELETE')); ?>

            <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger<?php echo e($task->id); ?> mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-taskid="<?php echo e($task->id); ?>">
                <i class="material-icons mdl-color-text--white">delete_forever</i>
                <span class="sr-only">Delete Task</span>
            </a>
        <?php echo Form::close(); ?>

    </td>

</tr>