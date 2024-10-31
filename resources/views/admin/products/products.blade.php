@extends('admin.layout.layout')

@section('content')
<div id="content">
    <div id="content-header">
        <h1>Products</h1>
        
        @if(Session::has('error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('error') !!}</strong>
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
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>View Products</h5>
                    </div>
                    
                    <div class="widget-content nopadding">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Products List</h4>
                            <a href="{{ route('admin.products.add_edit_product', ['id' => null]) }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Add Product
                            </a>
                        </div>
                        
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Color</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr class="gradeX">
                                        <td>{{ $product['id'] }}</td>
                                        <td>{{ $product['product_name'] }}</td>
                                        <td>{{ $product['product_code'] }}</td>
                                        <td>{{ $product['product_color'] }}</td>
                                        <td>
                                            @if(!empty($product['image']))
                                                <img src="{{ asset('/images/backend_images/products/small/'.$product['image']) }}" style="width:60px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if($product['status'] == 1)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-default">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a href="#myModal{{ $product['id'] }}" data-toggle="modal" class="btn btn-success btn-mini" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.products.add_edit_product', ['id' => null]) }}" class="btn btn-primary btn-mini" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-mini delete-button" data-id="{{ $product['id'] }}" data-toggle="modal" data-target="#deleteModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal for Product Details -->
                                    <div id="myModal{{ $product['id'] }}" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3>{{ $product['product_name'] }} Full Details</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Product ID:</strong> {{ $product['id'] }}</p>
                                            <p><strong>Product Code:</strong> {{ $product['product_code'] }}</p>
                                            <p><strong>Product Color:</strong> {{ $product['product_color'] }}</p>
                                            <p><strong>Price:</strong> {{ $product['product_price'] }}</p>
                                            <p><strong>Fabric:</strong> {{ $product['fabric'] }}</p>
                                            <p><strong>Description:</strong> {{ $product['description'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
