

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="mb-4">Products</h1>

    <?php if(Session::has('flash_message_error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo session('flash_message_error'); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>   
    <?php if(Session::has('flash_message_success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo session('flash_message_success'); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>   

    <div class="card">
        <div class="card-header">
            <h5>Add Product</h5>
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form enctype="multipart/form-data" method="post" action="<?php echo e(route('admin.products.add_edit_product', ['id' => $product->id ?? null])); ?>" name="add_product" id="add_product" novalidate>
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo e(old('product_name', $product->product_name ?? '')); ?>" required>
                </div>

                <div class="form-group">
                    <label for="product_code">Product Code</label>
                    <input type="text" name="product_code" id="product_code" class="form-control" value="<?php echo e(old('product_code', $product->product_code ?? '')); ?>" required>
                </div>

                <div class="form-group">
                    <label for="product_color">Product Color</label>
                    <input type="text" name="product_color" id="product_color" class="form-control" value="<?php echo e(old('product_color', $product->product_color ?? '')); ?>" required>
                </div>

                <div class="form-group">
                    <label for="family_color">Family Color</label>
                    <select name="family_color" id="family_color" class="form-control" required>
                        <option value="" disabled>Select a color</option>
                        <?php $__currentLoopData = ['red', 'blue', 'green', 'yellow', 'black', 'white', 'orange', 'purple']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($color); ?>" <?php echo e((old('family_color', $product->family_color ?? '') == $color) ? 'selected' : ''); ?>><?php echo e(ucfirst($color)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
    <label for="in_stock">Stokda var</label>
    <select name="in_stock" id="in_stock" class="form-control">
        <option value="1" <?php echo e(old('in_stock', $product->in_stock ?? 1) == 1 ? 'selected' : ''); ?>>Bəli</option>
        <option value="0" <?php echo e(old('in_stock', $product->in_stock ?? 1) == 0 ? 'selected' : ''); ?>>Xeyr</option>
    </select>
</div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="" disabled selected>Select a category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e((old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : ''); ?>><?php echo e($category->category_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required><?php echo e(old('description', $product->description ?? '')); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="group_code">Group Code</label>
                    <input name="group_code" id="group_code" class="form-control" rows="4"><?php echo e(old('group_code', $product->group_code ?? '')); ?>

                </div>

                <div class="form-group">
                    <label for="product_price">Product Price</label>
                    <input type="number" name="product_price" id="price" class="form-control" step="0.01" value="<?php echo e(old('product_price', $product->product_price ?? '')); ?>" required>
                </div>

                <div class="form-group">
                    <label for="discount">Product Discount</label>
                    <input type="number" name="product_discount" id="discount" class="form-control" step="0.01" value="<?php echo e(old('product_discount', $product->product_discount ?? '')); ?>">
                </div>

                <div class="form-group">
                    <label>Free Shipping</label>
                    <div class="form-check">
                        <input type="checkbox" name="free_shipping" id="free_shipping" class="form-check-input" <?php echo e((old('free_shipping', $product->free_shipping ?? 0) ? 'checked' : '')); ?>>
                        <label for="free_shipping" class="form-check-label">Enable free shipping</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Free Changes & Return</label>
                    <div class="form-check">
                        <input type="checkbox" name="free_changes_return" id="free_changes_return" class="form-check-input" <?php echo e((old('free_changes_return', $product->free_changes_return ?? 0) ? 'checked' : '')); ?>>
                        <label for="free_changes_return" class="form-check-label">Enable free changes and return</label>
                    </div>
                </div>

                <div class="control-group">
    
    <div class="form-group">
    <label for="product_size">Size</label>
    <select name="product_size" id="product_size" class="form-control" required>
        <option value="" disabled>Select a size</option>
        <?php $__currentLoopData = ['S', 'M', 'L', 'XL', 'XXL']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($size); ?>" <?php echo e((old('product_size', $product->product_size ?? '') == $size) ? 'selected' : ''); ?>><?php echo e($size); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="form-group">
    <label for="quantity">Product Quantity</label>
    <input type="number" name="quantity" id="quantity" class="form-control" value="<?php echo e(old('quantity', $product->quantity ?? 0)); ?>" min="0" required>
</div>


</div>


                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="<?php echo e(old('meta_title', $product->meta_title ?? '')); ?>">
                </div>

                <div class="form-group">
                    <label for="meta_keyword">Meta Keyword</label>
                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="<?php echo e(old('meta_keyword', $product->meta_keyword ?? '')); ?>">
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" rows="4"><?php echo e(old('meta_description', $product->meta_description ?? '')); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="wash_care">Wash Care Instructions</label>
                    <textarea name="wash_care" id="wash_care" class="form-control" rows="4"><?php echo e(old('wash_care', $product->wash_care ?? '')); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="fabric">Fabric</label>
                    <input type="text" name="fabric" id="fabric" class="form-control" value="<?php echo e(old('fabric', $product->fabric ?? '')); ?>">
                </div>

                <div class="form-group">
                    <label for="pattern">Pattern</label>
                    <input type="text" name="pattern" id="pattern" class="form-control" value="<?php echo e(old('pattern', $product->pattern ?? '')); ?>">
                </div>

                <div class="form-group">
    <label for="images">Product Images</label>
    <input type="file" name="images[]" id="images" class="form-control" multiple required>
</div>


                <button type="submit" class="btn btn-primary mt-3">Add Product</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e_lux\resources\views\admin\products\add_edit_product.blade.php ENDPATH**/ ?>