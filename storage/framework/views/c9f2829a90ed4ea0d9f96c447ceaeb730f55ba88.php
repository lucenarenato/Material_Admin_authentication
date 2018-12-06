<?php $__env->startSection('template_title'); ?>
  Showing Themes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    Showing Themes
<?php $__env->stopSection(); ?>

<?php
    $totalThemes = count($themes);
    $enableDataTablesCount = 50;
?>

<?php $__env->startSection('template_fastload_css'); ?>
    .mdl-badge[data-badge]:after {
        background-color: inherit;
    }
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
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
        <a itemprop="item" href="/themes" class="">
            <span itemprop="name">
                Themes
            </span>
        </a>
        <meta itemprop="position" content="2" />
    </li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-cell--12-col-desktop margin-top-0">
        <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
            <h2 class="mdl-card__title-text logo-style">
                <?php if($totalThemes === 1): ?>
                    <?php echo e($totalThemes); ?> Themes total
                <?php elseif($totalThemes > 1): ?>
                    <?php echo e($totalThemes); ?> Total Themes
                <?php else: ?>
                    No Themes :(
                <?php endif; ?>
            </h2>

        </div>
        <div class="mdl-card__supporting-text mdl-color-text--grey-600 padding-0 context">
            <div class="table-responsive material-table">
                <table id="themes_table" class="mdl-data-table mdl-js-data-table data-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric"><?php echo e(trans('themes.themesStatus')); ?></th>
                            <th class="mdl-data-table__cell--non-numeric mdl-layout--large-screen-only"><?php echo e(trans('themes.themesUsers')); ?></th>
                            <th class="mdl-data-table__cell--non-numeric"><?php echo e(trans('themes.themesName')); ?></th>
                            
                            <th class="mdl-data-table__cell--non-numeric no-sort no-search"><?php echo e(trans('themes.themesActions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $themeStatus = [
                                    'name'  => trans('themes.statusDisabled'),
                                    'class' => 'mdl-color--red-400'
                                ];
                                if($theme->status == 1) {
                                    $themeStatus = [
                                        'name'  => trans('themes.statusEnabled'),
                                        'class' => 'mdl-color--green-400'
                                    ];
                                }

                                $themeUsers = 0;
                                $themeCountClass = 'primary';
                                foreach($users as $user) {
                                    if($user->profile && $user->profile->theme_id === $theme->id) {
                                       $themeUsers += 1;
                                    }
                                }
                                $themeCountClass = 'mdl-color--grey-400';
                                if($themeUsers === 1) {
                                    $themeCountClass = 'mdl-color--blue-400';
                                } elseif($themeUsers >= 2) {
                                    $themeCountClass = 'mdl-color--orange-400';
                                } elseif($themeUsers === 5) {
                                    $themeCountClass = 'mdl-color--green-400';
                                } elseif($themeUsers === 10) {
                                    $themeCountClass = 'mdl-color--red-400';
                                }
                            ?>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric ">
                                    <span class="badge mdl-color-text--white <?php echo e($themeStatus['class']); ?>">
                                        <?php echo e($themeStatus['name']); ?>

                                    </span>
                                </td>
                                <td class="mdl-layout--large-screen-only">
                                    <div class="material-icons mdl-badge mdl-badge--overlap <?php echo e($themeCountClass); ?>" data-badge="<?php echo e($themeUsers); ?>"></div>
                                </td>
                                <td class="mdl-data-table__cell--non-numeric "><?php echo e($theme->name); ?></td>
                                
                                <td class="mdl-data-table__cell--non-numeric">
                                    <a href="/themes/<?php echo e($theme->id); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="<?php echo e(trans('themes.themesBtnShow')); ?>" id="view_theme_<?php echo e($theme->id); ?>">
                                        <i class="material-icons mdl-color-text--green-500" aria-hidden="true">remove_red_eye</i>
                                        <span class="sr-only"><?php echo e(trans('themes.themesBtnShow')); ?></span>
                                        <span class="mdl-tooltip mdl-tooltip--top" for="view_theme_<?php echo e($theme->id); ?>">
                                            <?php echo e(trans('themes.themesBtnShow')); ?>

                                        </span>
                                    </a>
                                    <a href="/themes/<?php echo e($theme->id); ?>/edit" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" title="<?php echo e(trans('themes.themesBtnShow')); ?>" id="edit_theme_<?php echo e($theme->id); ?>">
                                        <i class="material-icons mdl-color-text--orange-500" aria-hidden="true">create</i>
                                        <span class="sr-only"><?php echo e(trans('themes.themesBtnEdit')); ?></span>
                                        <span class="mdl-tooltip mdl-tooltip--top" for="edit_theme_<?php echo e($theme->id); ?>">
                                            <?php echo e(trans('themes.themesBtnEdit')); ?>

                                        </span>
                                    </a>

                                    <?php echo Form::open(['url' => 'themes/' . $theme->id, 'method' => 'delete', 'class' => 'inline-block', 'id' => 'delete_'.$theme->id]); ?>

                                        <?php echo Form::hidden('_method', 'DELETE'); ?>

                                        <a href="#" class="dialog-button dialiog-trigger-delete dialiog-trigger<?php echo e($theme->id); ?> mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-themeid="<?php echo e($theme->id); ?>" id="delete_theme_<?php echo e($theme->id); ?>">
                                            <i class="material-icons mdl-color-text--red" aria-hidden="true">delete</i>
                                            <span class="sr-only"><?php echo e(trans('themes.themesBtnDelete')); ?></span>
                                            <span class="mdl-tooltip mdl-tooltip--top" for="delete_theme_<?php echo e($theme->id); ?>">
                                                <?php echo e(trans('themes.themesBtnDelete')); ?>

                                            </span>
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

            <?php if($totalThemes > $enableDataTablesCount): ?>
                <?php echo $__env->make('partials.mdl-search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>

            <a href="<?php echo e(url('/themes/create')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Add New User" id="add_theme">
                <i class="material-icons" aria-hidden="true">add</i>
                <span class="sr-only"><?php echo e(trans('themes.btnAddTheme')); ?></span>
                <span class="mdl-tooltip mdl-tooltip--top" for="add_theme">
                    Add
                </span>
            </a>

        </div>
    </div>

    <?php echo $__env->make('dialogs.dialog-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php if($totalThemes > $enableDataTablesCount): ?>
        <?php echo $__env->make('scripts.mdl-datatables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('scripts.highlighter-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script type="text/javascript">
        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            mdl_dialog('.dialiog-trigger<?php echo e($theme->id); ?>','','#dialog_delete');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        var themeid;
        $('.dialiog-trigger-delete').click(function(event) {
            event.preventDefault();
            themeid = $(this).attr('data-themeid');
        });
        $('#confirm').click(function(event) {
            $('form#delete_'+themeid).submit();
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>