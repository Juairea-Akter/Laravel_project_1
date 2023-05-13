
<?php $__env->startSection('content'); ?>
<h1>Makeup artist dashboard</h1>


<div class="row">
    <div class="col-12 grid-margic">

        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Appointment</label>
                    <h1><?php echo e($totalAppointments); ?></h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total co artist</label>
                    <h1><?php echo e($totalCoArtist); ?></h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total packages</label>
                    <h1><?php echo e($totalPackages); ?></h1>

                </div>
            </div>


        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.makeup_artist.makeup_artist_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/makeup_artist/makeup_artist_layout/makeup_artist_dashboard.blade.php ENDPATH**/ ?>