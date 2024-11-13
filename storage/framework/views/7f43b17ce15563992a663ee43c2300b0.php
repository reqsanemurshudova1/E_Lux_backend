

<?php $__env->startSection('content'); ?>
<div id="content">
    <h1>Add Category</h1>

    <form method="POST" action="<?php echo e(route('admin.categories.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="category_name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views/admin/category/create.blade.php ENDPATH**/ ?>