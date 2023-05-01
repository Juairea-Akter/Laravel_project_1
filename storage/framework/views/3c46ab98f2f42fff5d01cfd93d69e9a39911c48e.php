
<?php $__env->startSection('content'); ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Sub Category
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?php echo e(route('sub_cat_add')); ?>" method="post" enctype="multipart/form-data">
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
                        <label for="exampleInputDescription" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputDescription">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputDescription">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputDescription">
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
            <th scope="col">Name</th>
            <th scope="col">Category Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td><?php echo e($key+1); ?></td>
            <td><?php echo e($sub_category ->name); ?></td>
            <td><?php echo e($sub_category->category->name); ?></td>
            <td><?php echo e($sub_category ->description); ?></td>
            <td><?php if($sub_category->image == null): ?>
                <img src="<?php echo e(asset('/uploads/profile/dummy.jpg')); ?>" height="50px" width="50px">
                <?php else: ?>
                <img src="<?php echo e(asset('/uploads/profile/'.$sub_category->image)); ?>" height="50px" width="50px">
                <?php endif; ?>
            </td>

            <td>
                <a class="btn btn" href="<?php echo e(route('sub_cat_edit',$sub_category->id)); ?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delcatModal">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="delcatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="delcatModal">Are you want to remove ?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a type="button" class="btn btn-danger" href="<?php echo e(route('sub_cat_delete',$sub_category->id)); ?>">Confirm</a>
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
<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Samanta\Laravel\Makeup_Artist\resources\views/backend/layout/subcategory/sublist.blade.php ENDPATH**/ ?>