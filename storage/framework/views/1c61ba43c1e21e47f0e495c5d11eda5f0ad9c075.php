<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php if(trim($__env->yieldContent('template_title'))): ?><?php echo $__env->yieldContent('template_title'); ?> | <?php endif; ?> <?php echo e(config('app.name', Lang::get('titles.app'))); ?></title>
        <meta name="description" content="">
        <meta name="author" content="Jeremy Kenedy">
        <link rel="shortcut icon" href="/favicon.ico">

        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        
        <?php echo HTML::style('https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,400,100,300,600,700', array('type' => 'text/css', 'rel' => 'stylesheet')); ?>

        <?php echo HTML::style(asset('https://fonts.googleapis.com/icon?family=Material+Icons'), array('type' => 'text/css', 'rel' => 'stylesheet')); ?>

        <?php echo $__env->yieldContent('template_linked_fonts'); ?>

        
        <?php if(Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null'): ?>
            <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/mdl-themes/' . $theme->link)); ?>" id="user_theme_link">
        <?php else: ?>
            <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/mdl-themes/material.min.css')); ?>" id="user_theme_link">
        <?php endif; ?>

        
        <link href="<?php echo e(mix('/css/app.css')); ?>" rel="stylesheet">

        <?php echo $__env->yieldContent('template_linked_css'); ?>

        <style type="text/css">
            <?php echo $__env->yieldContent('template_fastload_css'); ?>

            <?php if(Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0)): ?>
                .user-avatar-nav {
                    background: url(<?php echo e(Gravatar::get(Auth::user()->email)); ?>) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            <?php endif; ?>

        </style>

        
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>;
        </script>

        <?php echo $__env->yieldContent('head'); ?>

    </head>
    <body class="mdl-color--grey-100">

        <div id="app" class="demo-layout dashboard-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

            <?php echo $__env->make('partials.form-status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('template-form-status'); ?>

            <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                <div class="mdl-layout__header-row">

                    <span class="mdl-layout-title">

                        <?php echo $__env->yieldContent('header'); ?>

                    </span>

                    <div class="mdl-layout-spacer"></div>

                    

                    <?php echo $__env->make('partials.header-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>
            </header>

            <?php echo $__env->make('partials.drawer-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <main class="mdl-layout__content mdl-color--grey-100">

                <nav class="breadcrumb">
                    <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                        <?php echo $__env->yieldContent('breadcrumbs'); ?>
                    </ul>
                </nav>

                <div class="mdl-grid margin-top-0 padding-top-0">

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </main>
        </div>

        
        <?php echo HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', array('type' => 'text/javascript')); ?>

        <?php echo HTML::script('//code.getmdl.io/1.1.3/material.min.js', array('type' => 'text/javascript')); ?>

        <?php echo HTML::script('https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.4/dialog-polyfill.min.js', array('type' => 'text/javascript')); ?>


        <script src="<?php echo e(mix('/js/app.js')); ?>"></script>
        <script src="<?php echo e(mix('/js/mdl.js')); ?>"></script>

        <?php echo HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')); ?>


        <?php echo $__env->yieldContent('footer_scripts'); ?>

    </body>
</html>