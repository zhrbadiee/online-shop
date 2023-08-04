<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\app\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\post\PostController;
use App\Http\Controllers\admin\user\UserController;
use App\Http\Controllers\admin\order\OrderController;
use App\Http\Controllers\admin\post\PaymentController;
use App\Http\Controllers\admin\post\DeliveryController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\user\AdminUserController;
use App\Http\Controllers\app\salesProcess\CartController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\app\salesProcess\AddressController;

use App\Http\Controllers\app\salesProcess\PaymentAppController;
use App\Http\Controllers\app\post\PostController as PostController_App;
use App\Http\Controllers\app\profile\ProfileController as ProfileController;
use App\Http\Controllers\app\profile\OrderController as ProfileOrderController;
use App\Http\Controllers\app\category\CategoryController as CategoryController_App;
use App\Http\Controllers\app\profile\AddressController as ProfileAddressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('checkAdmin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('admin.index');

    Route::prefix('category')->namespace('admin\category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.create.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.edit.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
    Route::prefix('post')->namespace('admin\post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/store', [PostController::class, 'store'])->name('admin.post.create.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('admin.post.edit.update');
        Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');
        Route::get('/change-status/{id}', [PostController::class, 'changeStatus'])->name('admin.post.change-status');
    });
    Route::prefix('user')->namespace('admin\user')->group(function () {
        Route::get('/user_index', [UserController::class, 'index'])->name('admin.user.user-index');
        Route::get('/user_create', [UserController::class, 'create'])->name('admin.user.user-create');
        Route::post('/user_store', [UserController::class, 'store'])->name('admin.user.create-user-store');
        Route::get('/user_edit/{id}', [UserController::class, 'edit'])->name('admin.user.user-edit');
        Route::put('/user_update/{id}', [UserController::class, 'update'])->name('admin.user.edit-user-update');
        Route::delete('/user_destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.user-destroy');
        Route::get('/user_change_status/{id}', [UserController::class, 'changeStatus'])->name('admin.user.user-change-status');

        
        Route::get('/admin_index', [AdminUserController::class, 'index'])->name('admin.user.admin-index');
        Route::get('/admin_create', [AdminUserController::class, 'create'])->name('admin.user.admin-create');
        Route::post('/admin_store', [AdminUserController::class, 'store'])->name('admin.user.create-admin-store');
        Route::get('/admin_edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.admin-edit');
        Route::put('/admin_update/{id}', [AdminUserController::class, 'update'])->name('admin.user.edit-admin-update');
        Route::delete('/admin_destroy/{id}', [AdminUserController::class, 'destroy'])->name('admin.user.admin-destroy');
        Route::get('/admin_change_status/{id}', [AdminUserController::class, 'changeStatus'])->name('admin.user.admin-change-status');
    });
    Route::prefix('delivery')->group(function () {
        Route::get('/', [DeliveryController::class, 'index'])->name('admin.delivery.index');
        Route::get('/create', [DeliveryController::class, 'create'])->name('admin.delivery.create');
        Route::post('/store', [DeliveryController::class, 'store'])->name('admin.delivery.store');
        Route::get('/edit/{delivery}', [DeliveryController::class, 'edit'])->name('admin.delivery.edit');
        Route::put('/update/{delivery}', [DeliveryController::class, 'update'])->name('admin.delivery.update');
        Route::delete('/destroy/{delivery}', [DeliveryController::class, 'destroy'])->name('admin.delivery.destroy');
        Route::get('/status/{delivery}', [DeliveryController::class, 'status'])->name('admin.delivery.status');
    });
    //order
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'all'])->name('admin.order.all');
        Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.order.newOrders');
        Route::get('/sending', [OrderController::class, 'sending'])->name('admin.order.sending');
        Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.order.canceled');
        Route::get('/show/{order}', [OrderController::class, 'show'])->name('admin.order.show');
        Route::get('/show/{order}/detail', [OrderController::class, 'detail'])->name('admin.order.show.detail');
        Route::get('/change-send-status/{order}', [OrderController::class, 'changeSendStatus'])->name('admin.order.changeSendStatus');
        Route::get('/change-order-status/{order}', [OrderController::class, 'changeOrderStatus'])->name('admin.order.changeOrderStatus');
        Route::get('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('admin.order.cancelOrder');
    });

    // payment
    // Route::prefix('payment')->group(function () {
    //     Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.index');
    //     Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
    //     Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
    //     Route::get('/cash', [PaymentController::class, 'cash'])->name('admin.market.payment.cash');
    //     Route::get('/canceled/{payment}', [PaymentController::class, 'canceled'])->name('admin.market.payment.canceled');
    //     Route::get('/returned/{payment}', [PaymentController::class, 'returned'])->name('admin.market.payment.returned');
    //     Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('admin.market.payment.show');
    // });
});
/*
|--------------------------------------------------------------------------
| App Routes
|--------------------------------------------------------------------------
*/
Route::namespace('app')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('app.index');
    Route::get('/index', [HomeController::class, 'index'])->name('app.index');

    Route::get('/post/{id}', [PostController_App::class, 'show'])->name('app.post');
    Route::post('/post/add_comment/{id}', [PostController_App::class, 'addComment'])->name('app.add-comment');
});

Route::namespace('salesProcess')->group(function () {

    //cart
    Route::get('/cart', [CartController::class, 'cart'])->name('salesProcess.cart');
    Route::post('/cart', [CartController::class, 'updateCart'])->name('salesProcess.update-cart');
    Route::post('/add-to-cart/{post:id}', [CartController::class, 'addToCart'])->name('salesProcess.add-to-cart');
    Route::get('/remove-from-cart/{cartItem}', [CartController::class, 'removeFromCart'])->name('salesProcess.remove-from-cart');

    //address
    Route::get('/address-and-delivery', [AddressController::class, 'addressAndDelivery'])->name('sales-process.address-and-delivery');
    Route::post('/add-address', [AddressController::class, 'addAddress'])->name('sales-process.add-address');
    Route::put('/update-address/{address}', [AddressController::class, 'updateAddress'])->name('sales-process.update-address');
    Route::post('/choose-address-and-delivery', [AddressController::class, 'chooseAddressAndDelivery'])->name('sales-process.choose-address-and-delivery');

    //payment
    Route::get('/payment', [PaymentAppController::class, 'payment'])->name('sales-process.payment');
    Route::post('/payment-submit', [PaymentAppController::class, 'paymentSubmit'])->name('sales-process.payment-submit');
    
});

Route::namespace('Profile')->group(function () {

    Route::get('/orders', [ProfileOrderController::class, 'index'])->name('profile.orders');
    Route::get('/show/{order}/detail', [ProfileOrderController::class, 'detail'])->name('profile.order.show.detail');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.profile.update');
    Route::get('/my-addresses', [ProfileAddressController::class, 'index'])->name('profile.my-addresses');
});

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
