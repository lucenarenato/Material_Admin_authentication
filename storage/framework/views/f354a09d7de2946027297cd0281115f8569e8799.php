<div class="mdl-color--grey-700 mdl-card dark-table mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0 mdl-tabs__panel <?php echo e(isset($status) ? $status : ''); ?>" id="<?php echo e($tab); ?>">
    <div class="mdl-card__title mdl-color-text--white">
        <h2 class="mdl-card__title-text logo-style">
            <?php echo e($title); ?>

        </h2>
    </div>
    <div class="mdl-card__supporting-text mdl-color-text--white padding-0">
        <div class="table-responsive material-table inverse">
            <table class="mdl-color--grey-700 mdl-color-text--white mdl-data-table-block mdl-js-data-table data-table full-span table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white no-sort no-search"></th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white hide-mobile">ID</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white">Name</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white hide-mobile">Description</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white">Status</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-color-text--white no-sort no-search">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php echo $__env->make('tasks.partials.task-row', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="mdl-card__menu">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable search-white padding-top-0 hide-mobile">
            <label class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-button--icon" for="search_table">
                <i class="material-icons">search</i>
            </label>

            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="search" id="search_table" placeholder="Search Terms">
                <label class="mdl-textfield__label" for="search_table">
                    Search Terms
                </label>
            </div>
        </div>
        <a href="<?php echo e(url('/tasks/create')); ?>" class="mdl-button mdl-button--icon mdl-inline-expanded mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--white inline-block">
            <i class="material-icons">add</i>
        </a>
    </div>
</div>