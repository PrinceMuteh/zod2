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
                        
                        <table class="table  table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Sku</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Old Price</th>
                                    <th>quantity</th>
                                    <th>Label</th>
                                    <th>Status</th>
                                    <th>TodayDeal</th>
                                    <th>Featured</th>
                                    <th>Publish</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($product) < 1): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <h4 class="alert-heading">Empty</h4>
                                        <p>No Product Found yet</p>
                                        <p class="mb-0"></p>
                                    </div>
                                <?php else: ?>
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-id="<?php echo e($item->id); ?>">
                                            <td>
                                                <a href="<?php echo e(route('product.single', ['id' => $item->id])); ?>">
                                                    <img src="<?php echo e($item->pImage); ?>" height="80px" alt=""
                                                        srcset="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('product.single', ['id' => $item->id])); ?>">
                                                    <?php echo e($item->sku); ?>

                                                </a>
                                            </td>
                                            <td data-field="name">
                                                <a href="<?php echo e(route('product.single', ['id' => $item->id])); ?>">
                                                    <b> <?php echo e($item->pTitle); ?> </b> <br> $ <?php echo e($item->pSellingPrice); ?>

                                                </a>
                                            </td>
                                            <td data-field="manufacturer"><?php echo e($item->pCategory); ?></td>
                                            <td data-field="price"> $ <?php echo e(number_format($item->pOldPrice)); ?></td>
                                            <td data-field="price">
                                                <?php if($item->qty == 0): ?>
                                                    Out Of Stock
                                                <?php else: ?>
                                                    Avialable
                                                <?php endif; ?>
                                                <br>
                                                <?php echo e($item->qty); ?>

                                            </td>
                                            <td data-field="price"><?php echo e($item->label); ?></td>
                                            <td>
                                                <?php if($item->status == 'Approved'): ?>
                                                    <div class="text-success"><?php echo e($item->status); ?></div>
                                                <?php else: ?>
                                                    <div class="text-warning"><?php echo e($item->status); ?></div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->todayDeal == 'Yes'): ?>
                                                    <input type="checkbox" name="todayDeal" id="" checked>
                                                <?php else: ?>
                                                    <input type="checkbox" name="todayDeal" id="">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->featured == 'Yes'): ?>
                                                    <input type="checkbox" name="todayDeal" id="" checked>
                                                <?php else: ?>
                                                    <input type="checkbox" name="todayDeal" id="">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->publish == 'Yes'): ?>
                                                    <input type="checkbox" name="todayDeal" id="" checked>
                                                <?php else: ?>
                                                    <input type="checkbox" name="todayDeal" id="">
                                                <?php endif; ?>
                                            </td>

                                            
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm "
                                                    onclick="delete(<?php echo e($item->id); ?>)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zoidinc\vendor Dashboard\resources\views/Ecommerce/product-view.blade.php ENDPATH**/ ?>