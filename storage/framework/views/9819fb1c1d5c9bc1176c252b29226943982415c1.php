
<?php $__env->startSection('content'); ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Packages

</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new Pcakage</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?php echo e(route('makeup_artist_service_add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputCategoryName" class="form-label">Category Name</label>
                        <select name="cat_id" id="exampleInputDescription" class="form-control">
                            <option value="">Choose...</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCategoryName" class="form-label">Sub Category Name</label>
                        <select name="sub_cat_id" id="exampleInputDescription" class="form-control">
                            <option value="">Choose...</option>
                            <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sub_category->id); ?>"><?php echo e($sub_category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputservice" class="form-label">Package name</label>
                        <input type="text" class="form-control" name="package_name" id="exampleInputservice">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputservice" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputservice">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputservice" class="form-label">Price</label>
                        <input type="text" class="form-control" name="package_price" id="exampleInputservice">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
<hr>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Package Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Sub Category Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $packages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($packages ->package_name); ?></td>
            <td><?php echo e($packages ->category->name); ?></td>
            <td><?php echo e($packages->sub_category->name); ?></td>
            <td><?php echo e($packages ->description); ?></td>
            <td><?php echo e($packages ->package_price); ?></td>

            <td>
                <a class="btn btn" href="<?php echo e(route('makeup_artist_service_edit',$packages->id)); ?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you want to remove ?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a type="button" class="btn btn-danger" href="<?php echo e(route('makeup_artist_service_delete',$packages->id)); ?>">Confirm</a>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">NO</button>
                            </div>
                        </div>
                    </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.makeup_artist.makeup_artist_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP\Laravel_project_1\resources\views/frontend/makeup_artist/makeup_artist_layout/makeup_artist_service/makeup_artist_service_list.blade.php ENDPATH**/ ?>