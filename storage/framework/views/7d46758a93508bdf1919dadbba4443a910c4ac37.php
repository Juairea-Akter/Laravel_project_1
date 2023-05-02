
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 grid-margic">

        <?php if(session('message')): ?>
        <h6 class="alert alert-success"><?php echo e(session('message')); ?>,</h6>
        <?php endif; ?>
        <div class="me-md-3 me-xl-5">
            <h2> Admin Dashboard</h2>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Orders</label>
                    <h1><?php echo e($totalOrder); ?></h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Today Order</label>
                    <h1><?php echo e($todayOrder); ?></h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>This Month Order</label>
                    <h1><?php echo e($thisMonthOrder); ?></h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Year Order</label>
                    <h1><?php echo e($thisYearOrder); ?></h1>

                </div>
            </div>
            <hr>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Categories</label>
                    <h1><?php echo e($totalCategories); ?></h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Sub Categories</label>
                    <h1><?php echo e($totalSubCategories); ?></h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Packages</label>
                    <h1><?php echo e($totalPackages); ?></h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Makeup Artists</label>
                    <h1><?php echo e($totalAllUser); ?></h1>

                </div>
            </div>
            <hr>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Customers</label>
                    <h1><?php echo e($totalAllUser); ?></h1>

                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/dashboard.blade.php ENDPATH**/ ?>