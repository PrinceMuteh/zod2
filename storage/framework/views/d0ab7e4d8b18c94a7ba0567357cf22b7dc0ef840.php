<?php $__env->startSection('title'); ?>
    
    Category
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Category
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            View Completed Orders
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id="<?php echo e($item->id); ?>">
                                        <td data-field="name"><?php echo e($item->name); ?></td>
                                        <td data-field="name"><?php echo e($item->email); ?></td>
                                        <td data-field="name"><?php echo e($item->qty); ?></td>
                                        <td data-field="manufacturer"><?php echo e($item->totalPrice); ?></td>
                                        <td data-field="manufacturer"><?php echo e($item->status); ?></td>
                                        <td data-field="manufacturer"><?php echo e($item->created_at); ?></td>
                                        
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/table-edits/table-edits.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/table-editable.int.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zoidinc\vendor Dashboard\resources\views/Ecommerce/order-completed.blade.php ENDPATH**/ ?>