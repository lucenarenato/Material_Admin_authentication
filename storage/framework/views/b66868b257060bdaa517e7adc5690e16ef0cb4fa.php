<?php $__env->startSection('template_title'); ?>
  Showing Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    Showing All Users
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
    <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="/users" disabled>
            <span itemprop="name">
                Users List
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
    <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
        <h2 class="mdl-card__title-text logo-style">
            <?php if($totalUsers === 1): ?>
                <?php echo e($totalUsers); ?> User total
            <?php elseif($totalUsers > 1): ?>
                <?php echo e($totalUsers); ?> Total Users
            <?php else: ?>
                No Users :(
            <?php endif; ?>
        </h2>

    </div>
    <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
        <div class="table-responsive material-table">
            <table id="user_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">ID</th>
                    <th class="mdl-data-table__cell--non-numeric">Username</th>
                    <th class="mdl-data-table__cell--non-numeric">Email</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">First Name</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Last Name</th>
                    <th class="mdl-data-table__cell--non-numeric">Role</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Created</th>
                    <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only">Updated</th>
                    <th class="mdl-data-table__cell--non-numeric no-sort no-search">Actions</th>
                </tr>
              </thead>
              <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric"><a href="<?php echo e(URL::to('users/' . $user->id)); ?>"><?php echo e($user->id); ?></a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="<?php echo e(URL::to('users/' . $user->id)); ?>"><?php echo e($user->name); ?> </a></td>
                            <td class="mdl-data-table__cell--non-numeric"><a href="<?php echo e(URL::to('users/' . $user->id)); ?>"><?php echo e($user->email); ?> </a></td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="<?php echo e(URL::to('users/' . $user->id)); ?>"><?php echo e($user->first_name); ?> </a></td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="<?php echo e(URL::to('users/' . $user->id)); ?>"><?php echo e($user->last_name); ?> </a></td>
                            <td class="mdl-data-table__cell--non-numeric">
                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user_role->name == 'User'): ?>
                                        <?php
                                            $levelIcon        = 'person';
                                            $levelName        = 'User';
                                            $levelBgClass     = 'mdl-color--blue-200';
                                            $leveIconlBgClass = 'mdl-color--blue-500';
                                        ?>
                                    <?php elseif($user_role->name == 'Admin'): ?>
                                        <?php
                                            $levelIcon        = 'supervisor_account';
                                            $levelName        = 'Admin';
                                            $levelBgClass     = 'mdl-color--red-200';
                                            $leveIconlBgClass = 'mdl-color--red-500';
                                        ?>
                                    <?php elseif($user_role->name == 'Unverified'): ?>
                                        <?php
                                            $levelIcon        = 'person_outline';
                                            $levelName        = 'Unverified';
                                            $levelBgClass     = 'mdl-color--orange-200';
                                            $leveIconlBgClass = 'mdl-color--orange-500';
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $levelIcon        = 'person_outline';
                                            $levelName        = 'Unverified';
                                            $levelBgClass     = 'mdl-color--orange-200';
                                            $leveIconlBgClass = 'mdl-color--orange-500';
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(URL::to('users/' . $user->id)); ?>">
                                    <span class="mdl-chip mdl-chip--contact <?php echo e($levelBgClass); ?> mdl-color-text--white md-chip">
                                        <span class="mdl-chip__contact <?php echo e($leveIconlBgClass); ?> mdl-color-text--white">
                                            <i class="material-icons"><?php echo e($levelIcon); ?></i>
                                        </span>
                                        <span class="mdl-chip__text"><?php echo e($levelName); ?></span>
                                    </span>
                                </a>
                            </td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="<?php echo e(URL::to('users/' . $user->id)); ?>"><?php echo e($user->created_at); ?> </a></td>
                            <td class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><a href="<?php echo e(URL::to('users/' . $user->id)); ?>"><?php echo e($user->updated_at); ?> </a></td>
                            <td class="mdl-data-table__cell--non-numeric">


                                
                                <a href="/profile/<?php echo e($user->name); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="View User Profile">
                                    <i class="material-icons mdl-color-text--green">person</i>
                                </a>


                                
                                <a href="<?php echo e(URL::to('users/' . $user->id)); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="View User Account">
                                    <i class="material-icons mdl-color-text--blue">account_circle</i>
                                </a>

                                
                                <a href="<?php echo e(URL::to('users/' . $user->id . '/edit')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="material-icons mdl-color-text--orange">edit</i>
                                </a>

                                
                                <?php echo Form::open(array('url' => 'users/' . $user->id, 'class' => 'inline-block', 'id' => 'delete_'.$user->id)); ?>

                                    <?php echo Form::hidden('_method', 'DELETE'); ?>

                                    <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger<?php echo e($user->id); ?> mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-userid="<?php echo e($user->id); ?>">
                                        <i class="material-icons mdl-color-text--red">delete</i>
                                    </a>
                                <?php echo Form::close(); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
        </div>
    </div>
    <div class="mdl-card__menu" style="top: -4px;">

        <?php echo $__env->make('partials.mdl-highlighter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('partials.mdl-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <a href="<?php echo e(url('/users/create')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Add New User">
            <i class="material-icons">person_add</i>
            <span class="sr-only">Add New User</span>
        </a>

        <a href="<?php echo e(URL::to('/users/deleted')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Show Deleted Users">
            <i class="material-icons" aria-hidden="true">delete_sweep</i>
            <span class="sr-only">Show Deleted Users</span>
        </a>

    </div>
</div>

<?php echo $__env->make('dialogs.dialog-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
    <?php echo $__env->make('scripts.highlighter-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('scripts.mdl-datatables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script type="text/javascript">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            mdl_dialog('.dialiog-trigger<?php echo e($a_user->id); ?>','','#dialog_delete');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        var userid;
        $('.dialiog-trigger-delete').click(function(event) {
            event.preventDefault();
            userid = $(this).attr('data-userid');
        });
        $('#confirm').click(function(event) {
            $('form#delete_'+userid).submit();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>