<?php $__env->startSection('template_title'); ?>
  Create New User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
  Create New User
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
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="/users">
      <span itemprop="name">
        Users List
      </span>
    </a>
    <i class="material-icons">chevron_right</i>
    <meta itemprop="position" content="2" />
  </li>
  <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="/users/create">
      <span itemprop="name">
        Create New User
      </span>
    </a>
    <meta itemprop="position" content="3" />
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="mdl-grid full-grid margin-top-0 padding-0">
    <div class="mdl-cell mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop mdl-card mdl-shadow--3dp margin-top-0 padding-top-0">
        <div class="mdl-card card-new-user" style="width:100%;" itemscope itemtype="http://schema.org/Person">

        <div class="mdl-card__title mdl-card--expand mdl-color--green mdl-color-text--white">
          <h2 class="mdl-card__title-text logo-style">Create New User</h2>
        </div>

        <?php echo Form::open(array('action' => 'UsersManagementController@store', 'method' => 'POST', 'role' => 'form')); ?>


          <div class="mdl-card__supporting-text">
            <div class="mdl-grid full-grid padding-0">
              <div class="mdl-cell mdl-cell--12-col-phone mdl-cell--12-col-tablet mdl-cell--12-col-desktop">

                <div class="mdl-grid ">

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('name') ? 'is-invalid' :''); ?>">
                      <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z,0-9]*')); ?>

                      <?php echo Form::label('name', trans('auth.name') , array('class' => 'mdl-textfield__label'));; ?>

                      <span class="mdl-textfield__error">Letters and numbers only</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('email') ? 'is-invalid' :''); ?>">
                      <?php echo Form::email('email', NULL, array('id' => 'email', 'class' => 'mdl-textfield__input')); ?>

                      <?php echo Form::label('email', trans('auth.email') , array('class' => 'mdl-textfield__label'));; ?>

                      <span class="mdl-textfield__error">Please Enter a Valid <?php echo e(trans('auth.email')); ?></span>
                    </div>
                  </div>
                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('first_name') ? 'is-invalid' :''); ?>">
                            <?php echo Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')); ?>

                            <?php echo Form::label('first_name', 'First Name', array('class' => 'mdl-textfield__label'));; ?>

                            <span class="mdl-textfield__error">Letters only</span>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('last_name') ? 'is-invalid' :''); ?>">
                          <?php echo Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'mdl-textfield__input', 'pattern' => '[A-Z,a-z]*')); ?>

                          <?php echo Form::label('last_name', 'Last Name', array('class' => 'mdl-textfield__label'));; ?>

                          <span class="mdl-textfield__error">Letters only</span>
                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('twitter_username') ? 'is-invalid' :''); ?>">
                          <?php echo Form::text('twitter_username', NULL, array('id' => 'twitter_username', 'class' => 'mdl-textfield__input')); ?>

                          <?php echo Form::label('twitter_username', 'Twitter Username', array('class' => 'mdl-textfield__label'));; ?>

                      </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('github_username') ? 'is-invalid' :''); ?>">
                          <?php echo Form::text('github_username', NULL, array('id' => 'github_username', 'class' => 'mdl-textfield__input')); ?>

                          <?php echo Form::label('github_username', 'GitHub Username', array('class' => 'mdl-textfield__label'));; ?>

                      </div>
                    </div>

                    <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom-1 <?php echo e($errors->has('location') ? 'is-invalid' :''); ?>">
                        <?php echo Form::text('location', NULL, array('id' => 'location', 'class' => 'mdl-textfield__input' )); ?>

                        <?php echo Form::label('location', 'User Location', array('class' => 'mdl-textfield__label'));; ?>

                      <span class="mdl-textfield__error">Please Enter a Valid Location</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-select mdl-select__fullwidth <?php echo e($errors->has('role') ? 'is-invalid' :''); ?>">
                      <select class="mdl-selectfield__select mdl-textfield__input" name="role" id="role">
                        <option value=""></option>
                        <?php if($roles->count()): ?>
                          <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </select>
                      <label for="role">
                          <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                      </label>
                      <?php echo Form::label('role', trans('forms.label-userrole_id'), array('class' => 'mdl-textfield__label mdl-selectfield__label'));; ?>

                      <span class="mdl-textfield__error">Select user access level</span>
                    </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('password') ? 'is-invalid' :''); ?>">
                          <?php echo Form::password('password', array('id' => 'password', 'class' => 'mdl-textfield__input')); ?>

                          <?php echo Form::label('password', 'Password', array('class' => 'mdl-textfield__label'));; ?>

                        <span class="mdl-textfield__error">Please enter a valid password</span>
                      </div>
                  </div>

                  <div class="mdl-cell mdl-cell--4-col-tablet mdl-cell--6-col-desktop">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('password_confirmation') ? 'is-invalid' :''); ?>">
                          <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'mdl-textfield__input')); ?>

                          <?php echo Form::label('password_confirmation', 'Confirm Password', array('class' => 'mdl-textfield__label'));; ?>

                        <span class="mdl-textfield__error">Must match password</span>
                      </div>
                  </div>

                  <div class="mdl-cell mdl-cell--12-col">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php echo e($errors->has('bio') ? 'is-invalid' :''); ?>">
                          <?php echo Form::textarea('bio',  NULL, array('id' => 'bio', 'class' => 'mdl-textfield__input')); ?>

                          <?php echo Form::label('bio', 'Bio', array('class' => 'mdl-textfield__label'));; ?>

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
                  <?php echo Form::button('<i class="material-icons">save</i> Save New User', array('class' => 'dialog-button-save mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--green mdl-color-text--white mdl-button--raised margin-bottom-1 margin-top-1 margin-top-0-desktop margin-right-1 padding-left-1 padding-right-1 ')); ?>

                </span>

              </div>
            </div>
          </div>

            <div class="mdl-card__menu mdl-color-text--white">

              <span class="save-actions">
                <?php echo Form::button('<i class="material-icons">save</i>', array('class' => 'dialog-button-icon-save mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect', 'title' => 'Save New User')); ?>

              </span>

              <a href="<?php echo e(url('/users/')); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect mdl-color-text--white" title="Back to Users">
                  <i class="material-icons">reply</i>
                  <span class="sr-only">Back to Users</span>
              </a>

            </div>

            <?php echo $__env->make('dialogs.dialog-save', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

          <?php echo Form::close(); ?>


        </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <?php echo $__env->make('scripts.mdl-required-input-fix', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('scripts.gmaps-address-lookup-api3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <script type="text/javascript">
    mdl_dialog('.dialog-button-save');
    mdl_dialog('.dialog-button-icon-save');
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>