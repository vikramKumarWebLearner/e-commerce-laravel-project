<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WhishlistController;
use App\Http\Controllers\Frontend\UserDetailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::controller(FrontendController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    Route::get('/arrivals', 'newArrivals');
    Route::get('/featured','featuredProduct');
    Route::get('/search','searchProduct');
    Route::get('/myOrder','myOrder');
});
Route::match(['get', 'post'], '/botman', [BotManController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/whishlist', [WhishlistController::class, 'whishlist']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('frotend.checkout.index');
    
    //pay pal
    Route::get('create-transaction', [PaymentController::class, 'createTransaction'])->name('createTransaction');
    Route::get('process-transaction/{amount}', [PaymentController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');

    //Order
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{orderId}', [OrderController::class, 'show']);

    Route::get('/profile',[UserDetailController::class, 'index']);
    Route::post('/profile',[UserDetailController::class, 'update']);
    Route::get('/user-password',[UserDetailController::class, 'changePassword']);
    Route::put('/user-password-update',[UserDetailController::class, 'updatePassword']);
});

//thank you page
Route::get('/thank-you', [FrontendController::class, 'thankyou']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index']);
   
    Route::get('/setting',[SettingController::class,'index']);
    Route::post('/store',[SettingController::class,'store']);
    //category routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    //Product route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/product/{product}', 'update');
        Route::any('product/{product_id}/delete', 'delete');
        Route::any('/product_image/{product_image_id}/delete', 'destory_image');

        // Ajax use product_color update or delete
        Route::post('/product-color/{prod_color_id}', 'updateProductColor');
        Route::any('/product_color/{prod_color_id}/delete', 'deleteProductColor');

    });

    //Color route
    Route::controller(ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/color/create', 'create');
        Route::post('/color', 'store');
        Route::get('/color/{color}/edit', 'edit');
        Route::put('/color/{color_id}', 'update');
        Route::any('color/{color_id}/delete', 'delete');
    });

    //Home Sliders
    Route::controller(SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/slides/create', 'create');
        Route::post('/sliders', 'store');
        Route::get('/slider/{slider_id}/edit', 'edit');
        Route::put('/sliders/{slider_id}', 'update');
        Route::any('/slider/{slider_id}/delete', 'delete');
    });

    //brands
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    //orders
    Route::controller(OrderController::class)->group(function(){
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderid}', 'updateStatus');
    
        //Invoice
        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generateInvoice','generateInvoice');
        Route::get('/invoice/{orderId}/mail','invoiceMail');
    });
   
    //users
    Route::controller(UserController::class)->group(function () {
        Route::get('/users','index')->name('index');
        Route::get('/user/create', 'create');
        Route::post('/user','store');
        Route::get('/user/{user_id}/edit', 'edit')->whereNumber('user_id');
        Route::put('/user/{user_id}','update')->whereNumber('user_id');
        Route::any('/user/{user_id}/delete','delete');
    });
        
});


// Email Verification send
Route::get('/email/verify', "Auth\VerificationController@verify_email")->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::any('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Google Socilte login
Route::get('/login/google', [RegisterController::class,'socialiteLogin'])->name('google.register');
Route::get('/login/google/callback', [RegisterController::class,'handleGoogleCallback']);

