

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <h1>Shopping Cart</h1>

    <?php if($basketItems->isEmpty()): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $basketItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e(asset('storage/' . $item->product->image)); ?>" alt="<?php echo e($item->product->title); ?>" class="img-fluid" width="100"></td>
                        <td><?php echo e($item->product->title); ?></td>
                        <td><?php echo e($item->stock_count); ?></td>
                        <td>$<?php echo e($item->product->price); ?></td>
                        <td>$<?php echo e($item->product->price * $item->stock_count); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="text-right">
            <h3>Total Price: $<?php echo e($totalPrice); ?></h3>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\cart\index.blade.php ENDPATH**/ ?>