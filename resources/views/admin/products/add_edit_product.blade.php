@extends('admin.layout.layout')

@section('content')
<div id="content">
    <div id="content-header">
        <h1>Products</h1>
        @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif   
    </div>

    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-info-sign"></i></span>
                        <h5>Add Product</h5>
                    </div>
                    <div class="widget-content nopadding">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ route('admin.products.add_edit_product', ['id' => $product->id ?? null]) }}" name="add_product" id="add_product" novalidate="novalidate">
                            @csrf

                            <div class="control-group">
                                <label class="control-label">Product Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="product_name" class="span12" value="{{ old('product_name', $product->product_name ?? '') }}" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product Code</label>
                                <div class="controls">
                                    <input type="text" name="product_code" id="product_code" class="span12" value="{{ old('product_code', $product->product_code ?? '') }}" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product Color</label>
                                <div class="controls">
                                    <input type="text" name="product_color" id="product_color" class="span12" value="{{ old('product_color', $product->product_color ?? '') }}" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Family Color</label>
                                <div class="controls">
                                    <select name="family_color" id="family_color" class="span12" required>
                                        <option value="" disabled>Select a color</option>
                                        <option value="red" {{ (old('family_color', $product->family_color ?? '') == 'red') ? 'selected' : '' }}>Red</option>
                                        <option value="blue" {{ (old('family_color', $product->family_color ?? '') == 'blue') ? 'selected' : '' }}>Blue</option>
                                        <option value="green" {{ (old('family_color', $product->family_color ?? '') == 'green') ? 'selected' : '' }}>Green</option>
                                        <option value="yellow" {{ (old('family_color', $product->family_color ?? '') == 'yellow') ? 'selected' : '' }}>Yellow</option>
                                        <option value="black" {{ (old('family_color', $product->family_color ?? '') == 'black') ? 'selected' : '' }}>Black</option>
                                        <option value="white" {{ (old('family_color', $product->family_color ?? '') == 'white') ? 'selected' : '' }}>White</option>
                                        <option value="orange" {{ (old('family_color', $product->family_color ?? '') == 'orange') ? 'selected' : '' }}>Orange</option>
                                        <option value="purple" {{ (old('family_color', $product->family_color ?? '') == 'purple') ? 'selected' : '' }}>Purple</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Category</label>
                                <div class="controls">
                                    <select name="category_id" id="category_id" class="span12" required>
                                        <option value="" disabled selected>Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" id="description" class="span12" rows="4" required>{{ old('description', $product->description ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Group Code</label>
                                <div class="controls">
                                    <textarea name="group_code" id="group_code" class="span12" rows="4">{{ old('group_code', $product->group_code ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product Price</label>
                                <div class="controls">
                                    <input type="number" name="product_price" id="price" class="span12" step="0.01" value="{{ old('product_price', $product->product_price ?? '') }}" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product Discount</label>
                                <div class="controls">
                                    <input type="number" name="product_discount" id="discount" class="span12" step="0.01" value="{{ old('product_discount', $product->product_discount ?? '') }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Free Shipping</label>
                                <div class="controls">
                                    <input type="checkbox" name="free_shipping" id="free_shipping" {{ (old('free_shipping', $product->free_shipping ?? 0) ? 'checked' : '') }}>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Free Changes & Return</label>
                                <div class="controls">
                                    <input type="checkbox" name="free_changes_return" id="free_changes_return" {{ (old('free_changes_return', $product->free_changes_return ?? 0) ? 'checked' : '') }}>
                                </div>
                            </div>
                            <div class="control-group">
    <label class="control-label">Size</label>
    <div class="controls">
        <input type="text" name="product_size" id="size" class="span12" value="{{ old('size', $product->size ?? '') }}">
    </div>
</div>

                            <div class="control-group">
                                <label class="control-label">Meta Title</label>
                                <div class="controls">
                                    <input type="text" name="meta_title" id="meta_title" class="span12" value="{{ old('meta_title', $product->meta_title ?? '') }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Meta Keyword</label>
                                <div class="controls">
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="span12" value="{{ old('meta_keyword', $product->meta_keyword ?? '') }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Meta Description</label>
                                <div class="controls">
                                    <textarea name="meta_description" id="meta_description" class="span12" rows="4">{{ old('meta_description', $product->meta_description ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Wash Care Instructions</label>
                                <div class="controls">
                                    <textarea name="wash_care" id="wash_care" class="span12" rows="4">{{ old('wash_care', $product->wash_care ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Fabric</label>
                                <div class="controls">
                                    <input type="text" name="fabric" id="fabric" class="span12" value="{{ old('fabric', $product->fabric ?? '') }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Pattern</label>
                                <div class="controls">
                                    <input type="text" name="pattern" id="pattern" class="span12" value="{{ old('pattern', $product->pattern ?? '') }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image" class="span12">
                                    @if(isset($product->image) && !empty($product->image))
                                        <img src="{{ asset('images/products/'.$product->image) }}" style="width: 100px; margin-top: 10px;">
                                    @endif
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <input type="submit" value="Add Product" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
