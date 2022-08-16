<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Editable_Table'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Products
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            View Products
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Products</h4>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>manufacturer Name</th>
                                    <th>manufacturer Brand</th>
                                    <th>price</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-id="<?php echo e($item->id); ?>">
                                        <td data-field="name"><?php echo e($item->product_name); ?></td>
                                        <td data-field="manufacturer"><?php echo e($item->manufacturer_name); ?></td>
                                        <td data-field="brand"><?php echo e($item->manufacturer_brand); ?></td>
                                        <td data-field="price"><?php echo e($item->price); ?></td>
                                        
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
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
<script>
    $("table tr td").editable({

    save: function(values) {
      var id = $(this).data('id-field');
    //   var id = $(this).children();

      console.log(id);
    //   $.post('/api/object/' + id, values);
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zoidinc\vendor Dashboard\resources\views/ecommerce-view-product.blade.php ENDPATH**/ ?>