<?php if(session()->has('success')): ?>
    <div class=" ontainer alert alert-success alert-dismissible fade show" role="alert">
        <strong>success !</strong>
        <?php echo e(session()->get('success')); ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    
    <!-- Modal -->
<?php endif; ?>

<?php if(session()->has('Emessage')): ?>
    <div class="alert alert-danger text-capitalize">
        <?php echo e(session()->get('Emessage')); ?>

    </div>
<?php endif; ?>


<?php if(session('status')): ?>
    <div class="alert alert-warning text-capitalize">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Whoops !</strong>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\zoidinc\vendor Dashboard\resources\views/layouts/message.blade.php ENDPATH**/ ?>