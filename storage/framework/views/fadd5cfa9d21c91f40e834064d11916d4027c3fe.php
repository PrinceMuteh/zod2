<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Lock_Screen'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="<?php echo e(url('index')); ?>" class="d-block auth-logo">
                                        <img src="<?php echo e(URL::asset('assets/images/logo.png')); ?>" alt="" height="84">
                                        
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Lock Screen</h5>
                                        <p class="text-muted mt-2">Enter your password to unlock the screen!</p>
                                    </div>
                                    <div class="user-thumb text-center mb-4 mt-4 pt-2">
                                        <img src="<?php if(Auth::user()->avatar != ''): ?> <?php echo e(Auth::user()->avatar); ?><?php else: ?><?php echo e(URL::asset('assets/images/users/avatar-1.png')); ?> <?php endif; ?>"
                                            class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                        <h5 class="font-size-15 mt-3"><?php echo e(Auth::user()->name); ?></h5>
                                    </div>
                                    <form class="mt-4" action="<?php echo e(url('index')); ?>">
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="password" class="form-control" id="input-password"
                                                placeholder="Enter Password">
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-4">
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Unlock</button>
                                        </div>
                                    </form>

                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0">Not you ? return <a href="<?php echo e(url('login')); ?>"
                                                class="text-primary fw-semibold"> Sign In </a> </p>
                                    </div>
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> Zoidinc
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->
                        <div class="row justify-content-center align-items-end">
                            <div class="col-xl-7">
                                <div class="p-0 p-sm-4 px-xl-0">
                                    <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">

                                        
                                    </div>
                                    <!-- end review carousel -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/js/pages/feather-icon.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\zoidinc\vendor Dashboard\resources\views/auth-lock-screen.blade.php ENDPATH**/ ?>