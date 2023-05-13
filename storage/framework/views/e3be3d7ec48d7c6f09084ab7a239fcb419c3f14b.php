
<?php $__env->startSection('content'); ?>

<style>
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <?php if($user->image): ?>
                <img class="rounded-circle mt-5" width="150px" height="150px" style="object-fit: cover; object-position: top;" src="<?php echo e(asset('/uploads/profile/'.$user->image)); ?>">
                <?php else: ?>
                <img class="rounded-circle mt-5" width="150px" height="150px" style="object-fit: cover; object-position: top;" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <?php endif; ?>
                <span class="font-weight-bold"><?php echo e($user->name); ?></span><span class="text-black-50"><?php echo e($user->email); ?></span><span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post">

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Full name" value="<?php echo e($user->name); ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter email address" value="<?php echo e($user->email); ?>"></div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Address" value="<?php echo e($user->address); ?>"></div>
                        <div class="col-md-6"><label class="labels">Phone</label><input type="text" class="form-control" value="<?php echo e($user->phone); ?>" placeholder="Phone"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <p>Document</p>
                <img src="<?php echo e(asset('/uploads/profile/'.$user->doc)); ?>" alt="<?php echo e($user->doc); ?>" style="max-height: 300px;object-fit: cover; object-position: top;">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.makeup_artist.makeup_artist_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/makeup_artist/makeup_artist_layout/artist_profile/edit_artist_profile.blade.php ENDPATH**/ ?>