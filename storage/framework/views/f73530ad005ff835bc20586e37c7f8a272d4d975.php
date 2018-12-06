<div class="mdl-card__supporting-text padding-bottom-0 mdl-color-text--white">
    <h3 class="mdl-card__title-text">
        Incomplete Tasks
    </h3>

        <?php if(count($incompleteTasks) >= 1): ?>

            <ul style="list-style-type:none; padding-left: .5em;">

                <?php $__currentLoopData = $incompleteTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li>

                        <?php echo Form::model($task, array('action' => array('TasksController@update', $task->id), 'method' => 'PUT', 'class'=>'form-inline', 'role' => 'form')); ?>


                            <label for="completed-<?php echo e($task->id); ?>" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                                <?php echo Form::hidden('name', $task->name, array('id' => 'task-name-'.$task->name)); ?>

                                <?php echo Form::hidden('description', $task->description, array('id' => 'task-description-'.$task->id)); ?>

                                <?php echo Form::checkbox('completed', 1, $task->completed, ['id' => 'completed-'.$task->id, 'class' => 'mdl-checkbox__input','onClick' => 'this.form.submit()']); ?>

                                <span class="mdl-checkbox__label">
                                    <?php echo e($task->name); ?>

                                </span>

                            </label>

                        <?php echo Form::close(); ?>


                    </li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

        <?php else: ?>
            <h6 class="text-center margin-top-2 margin-bottom-3">
                Hooray, you have no incomplete tasks!
            </h6>
        <?php endif; ?>

</div>
<div class="mdl-card__actions mdl-card--border">
    <a href="/tasks" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">
        See All Tasks
    </a>
</div>
