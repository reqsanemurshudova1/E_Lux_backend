<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\PaymentMethodsController;
use App\Http\Controllers\Admin\OurServicesController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\Api\ProductsDescriptionController;
use App\Http\Controllers\Admin\Api\ProductReviewController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public API Routes
Route::middleware('api')->group(function () {
    Route::get('/partners', [PartnerController::class, 'getPartners']);
    Route::get('/home-banners', [HomeBannerController::class, 'getBanners']);
    Route::get('/payment-methods', [PaymentMethodsController::class, 'getPaymentMethods']);
    Route::get('/our-services', [OurServicesController::class, 'getOurServices']);
    Route::get('/products', [ProductsController::class, 'getProducts']);
    Route::get('/product-details/{id}', [ProductsDescriptionController::class, 'show']);
    Route::get('/posts', [PostController::class, 'getPosts']);

    Route::post('/product-reviews', [ProductReviewController::class, 'store']);
    Route::put('/product-reviews/{id}', [ProductReviewController::class, 'update']);
    Route::delete('/product-reviews/{id}', [ProductReviewController::class, 'destroy']);
    Route::get('/product-reviews', [ProductReviewController::class, 'index']);
    Route::get('/product-reviews/{productId}', [ProductReviewController::class, 'getReviewsByProduct']);

});
