<?php if(session('message')): ?>
  <div class="message message dismissible">
    <i class="material-icons status">&#xE876;</i>
    <h4>
        <?php echo e(trans('auth.message')); ?>

    </h4>
    <p>
        <?php echo e(session('message')); ?>

    </p>
  </div>
<?php endif; ?>

<?php if(session('success')): ?>
  <div class="success message dismissible">
    <i class="material-icons status">&#xE876;</i>
    <h4>
        <?php echo e(trans('auth.success')); ?>

    </h4>
    <p>
        <?php echo e(session('success')); ?>

    </p>
  </div>
<?php endif; ?>

<?php if(session('status')): ?>
  <?php if(session()->get('status') == 'wrong'): ?>
    <div class="warning message dismissible">
      <i class="material-icons status">&#xE645;</i>
      <h4>
          <?php echo e(trans('auth.someProblems')); ?>

      </h4>
      <p>
          <?php echo e(session('message')); ?>

      </p>
    </div>
  <?php else: ?>
    <div class="success message dismissible">
      <i class="material-icons status">&#xE876;</i>
      <h4>
          <?php echo e(trans('auth.success')); ?>

      </h4>
      <p>
          <?php echo e(session('status')); ?>

      </p>
    </div>
  <?php endif; ?>
<?php endif; ?>

<?php if(session('notice')): ?>
  <div class="warning message dismissible">
    <i class="material-icons status">&#xE645;</i>
    <h4>
        <?php echo e(trans('auth.noticeTitle')); ?>

    </h4>
    <p>
        <?php echo e(session('notice')); ?>

    </p>
  </div>
<?php endif; ?>

<?php if(session('anError')): ?>
  <div class="warning message dismissible">
    <i class="material-icons status">&#xE645;</i>
    <h4>
        <?php echo e(trans('auth.someProblems')); ?>

    </h4>
    <p>
        <?php echo e(session('anError')); ?>

    </p>
  </div>
<?php endif; ?>

<?php if(session('error')): ?>
  <div class="warning message dismissible">
    <i class="material-icons status">&#xE645;</i>
    <h4>
        <?php echo e(trans('auth.someProblems')); ?>

    </h4>
    <p>
        <?php echo e(session('error')); ?>

    </p>
  </div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
  <div class="error message dismissible">
    <i class="material-icons status">&#xE5CD;</i>
    <h4>
        <?php echo e(trans('auth.someProblems')); ?>

    </h4>
    <p>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($error); ?> <br />
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>
  </div>
<?php endif; ?>