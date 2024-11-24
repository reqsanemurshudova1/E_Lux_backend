

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1>Shipping Methods</h1>
    <a href="<?php echo e(route('admin.shipping.create')); ?>" class="btn btn-primary mb-3">Add New Shipping Method</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Delivery Time</th>
                <th>Carrier</th>
                <th>Min Amount</th>
                <th>Max Amount</th>
                <th>Additional Charges</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $shippingMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($method->id); ?></td>
                <td><?php echo e($method->name); ?></td>
                <td>$<?php echo e($method->price); ?></td>
                <td><?php echo e($method->delivery_time); ?></td>
                <td><?php echo e($method->carrier); ?></td>
                <td>$<?php echo e($method->min_amount); ?></td>
                <td>$<?php echo e($method->max_amount); ?></td>
                <td>$<?php echo e($method->additional_charges); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.shipping.edit', $method->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?php echo e(route('admin.shipping.destroy', $method->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views/admin/shipping/index.blade.php ENDPATH**/ ?>