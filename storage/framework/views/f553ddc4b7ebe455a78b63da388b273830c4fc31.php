<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('auth.loginPageTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="mdl-layout mdl-js-layout mdl-color--grey-100 mdl-auth-form">
        <main class="mdl-layout__content_auth">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text text-center full-span block">

                        <?php echo e(trans('titles.app')); ?>


                    </h2>
                </div>
                <div class="mdl-card__supporting-text">

                    <?php echo Form::open(['url' => 'login', 'method' => 'POST', 'class' => '', 'id' => 'login', 'role' => 'form']); ?>

                        <?php echo e(csrf_field()); ?>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('email') ? 'is-invalid' :''); ?>">
                            <?php echo Form::email('email', null, array('id' => 'email', 'class' => 'mdl-textfield__input', )); ?>

                            <?php echo Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label'));; ?>

                            <?php if($errors->has('email')): ?>
                                <span class="mdl-textfield__error"><?php echo e(trans('auth.emailLoginError')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('password') ? 'is-invalid' :''); ?>">
                            <?php echo Form::password('password', array('id' => 'userpass', 'class' => 'mdl-textfield__input')); ?>

                            <?php echo Form::label('password', trans('auth.password') , array('class' => 'mdl-textfield__label'));; ?>

                            <?php if($errors->has('password')): ?>
                                <span class="mdl-textfield__error"><?php echo e(trans('auth.pwLoginError')); ?></span>
                            <?php endif; ?>
                        </div>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                            <?php echo Form::checkbox('remember', 'remember', null, ['id' => 'remember', 'class' => 'mdl-checkbox__input', old('remember') ? 'checked' : '']);; ?>

                            <span class="mdl-checkbox__label"><?php echo e(trans('auth.rememberMe')); ?></span>
                        </label>
                        <?php echo Form::button('<span class="mdl-spinner-text">'.trans('auth.login').'</span><div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner mdl-color-text--white mdl-color-white"></div>', array('class' => 'mdl-button mdl-js-button mdl-js-ripple-effect center mdl-color--primary mdl-color-text--white mdl-button--raised full-span margin-bottom-1 margin-top-2','type' => 'submit','id' => 'submit')); ?>

                    <?php echo Form::close(); ?>


                </div>
                <div class="mdl-card__actions mdl-card--border">

                    <?php echo $__env->make('partials.socials-icons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>
                <div class="mdl-card__actions mdl-card--border">

                    <?php echo HTML::link(route('password.request'), trans('auth.forgot'), array('id' => 'forgot', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect left')); ?>

                    <?php echo HTML::link(url('/register'), trans('auth.register'), array('id' => 'register', 'class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect right')); ?>


                </div>
            </div>
        </main>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>