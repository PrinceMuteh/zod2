<?php $__env->startSection('title'); ?>
    
    Category
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/select2/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Ecommerce
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Add Category
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category Information</h4>
                    <p class="card-title-desc">Fill all information below</p>
                </div>
                <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($type == 'view'): ?>
                    <div class="card-body">
                        <form action="<?php echo e(route('category.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="categoryname">Category Name</label>
                                        <input id="categoryname" value="<?php echo e(old('category_name')); ?>" name="category"
                                            type="text" class="form-control" placeholder="Product Name">
                                    </div>

                                    <label for="icon">Select Icon</label>
                                    <select class="form-control select2 " name="icon" value="<?php echo e(old('icon')); ?>">
                                        <option>Select</option>
                                        <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->icon); ?>"> <?php echo e($item->icon); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <div class="mb-3 mt-3 ">
                                        <label for="image"> Select Image</label>
                                        <input type="file" name="image" id="" class="form-control ">
                                    </div>

                                    <div class="mb-3 mt-3 ">
                                        <label for="categorydesc">Category Description</label>
                                        <textarea class="form-control" id="categorydesc" name="categoryDescription" value="<?php echo e(old('category_description')); ?>"
                                            rows="5" placeholder="Category Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Category</button>
                            </div>
                        </form>
                    </div>
                    
                <?php endif; ?>

            </div>

        </div>
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/dropzone/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/ecommerce-select2.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zoidinc\vendor Dashboard\resources\views/Ecommerce/category.blade.php ENDPATH**/ ?>