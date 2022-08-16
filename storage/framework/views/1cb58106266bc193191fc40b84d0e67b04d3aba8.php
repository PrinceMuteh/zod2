<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Add_Product'); ?>
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
            Add Product
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Information</h4>
                    <?php if($type == 'view'): ?>
                        <p class="card-title-desc">Fill all information below</p>
                    <?php else: ?>
                        <p class="card-title-desc">Image</p>
                    <?php endif; ?>
                </div>
                <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($type == 'view'): ?>
                    <div class="card-body">

                        <form action="<?php echo e(route('product.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="pTitle">Product Name</label>
                                        <input id="pTitle" value="<?php echo e(old('pTitle')); ?>" name="pTitle"
                                            type="text" class="form-control" placeholder="Product Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="manufacturername">Manufacturer Name</label>
                                        <input id="manu_name" value="<?php echo e(old('manu_name')); ?>"
                                            name="manu_name" type="text" class="form-control"
                                            placeholder="Manufacturer Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="manu_brand">Manufacturer Brand</label>
                                        <input id="manu_brand" value="<?php echo e(old('manu_brand')); ?>"
                                            name="manu_brand" type="text" class="form-control"
                                            placeholder="Manufacturer Brand">
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="price">Old Price</label>
                                                <input id="price" name="pOldPrice" value="<?php echo e(old('oldPrice')); ?>"
                                                    type="text" class="form-control" placeholder="Old Price">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="price">Selling Price</label>
                                                <input id="price" name="pSellingPrice"
                                                    value="<?php echo e(old('pSellingPrice')); ?>" type="text" class="form-control"
                                                    placeholder="SellingPrice">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="control-label">Category</label>
                                                <select class="form-control select2" name="pCategory"
                                                    value="<?php echo e(old('pCategory')); ?>">
                                                    <option>Select</option>
                                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->category); ?>"> <?php echo e($item->category); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Label</label>
                                                <select class="form-control select2" name="label"
                                                    value="<?php echo e(old('label')); ?>">
                                                    <option>Select</option>
                                                    <option value="Top">Top Deals </option>
                                                    <option value="Trending">Trending </option>
                                                    <option value="New">New </option>

                                                    
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <label class="control-label">Feature</label>
                                                <select class="select2 form-control select2-multiple" name="features"
                                                    value="<?php echo e(old('features')); ?>" multiple="multiple"
                                                    data-placeholder="Choose ...">
                                                    <option value="WI">Wireless</option>
                                                    <option value="BE">Battery life</option>
                                                    <option value="BA">Bass</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="qty">Quantity</label>
                                                <input id="qty" name="qty" value="<?php echo e(old('qty')); ?>"
                                                    type="number" class="form-control" placeholder="Quntity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productdesc">Product Description</label>
                                        <textarea class="form-control" id="shortDescription" name="shortDescription" value="<?php echo e(old('shortDescription')); ?>" rows="5"
                                            placeholder="Product Description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Product</button>
                                
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="card-body">
                        <form action="<?php echo e(route('droppzone.store')); ?>" method="post" class="dropzone"
                            id="image-upload">
                            <input type="hidden" name="sku" value = "<?php echo e($sku); ?>">
                            <input type="hidden" name="type" value="Product">
                            <?php echo csrf_field(); ?>
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>
                                <h4>Drop files here or click to upload.</h4>
                            </div>
                        </form>
                        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary mt-2 btn-lg"> Done </a>
                    </div>
                <?php endif; ?>
            </div>

            

            <!-- end card-->

            
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zoidinc\vendor Dashboard\resources\views/Ecommerce/addProduct.blade.php ENDPATH**/ ?>