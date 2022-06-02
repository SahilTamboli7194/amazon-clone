<?php

use App\Http\Controllers\AddressTypesController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorProductsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\DeliveryAddressesController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderStatusesController;
use App\Http\Controllers\PaymentModesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SellerProductsController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// REST routs
// keep url plural and controller also
// /products ProductsController
//
// web 7 
// api 4-5
// products @index GET
// products/:Id @show GET
// products/:id @update PUT
// follow documenation

//route for user 
// Route::get('/user_signup/{user_type}',[UserController::class,'create']);
// Route::post('/user_signup',[UserController::class,'store']);
// Route::get('/user/{user:id}/{user_type}/edit',[UserController::class,'edit']);
// Route::patch('/user/{user:id}',[UserController::class,'update']);
// Route::delete('user/{user:id}',[UserController::class,'delete']);


Route::resource('users', UsersController::class);

Route::resource('products', ProductsController::class);

Route::resource('address-types', AddressTypesController::class);

Route::resource('brands', BrandsController::class);

Route::resource('cart-products', CartProductsController::class);

Route::resource('carts', CartsController::class);

Route::resource('categories', CategoriesController::class);

Route::resource('color-products', ColorProductsController::class);

Route::resource('colors', ColorsController::class);

Route::resource('coupons', CouponsController::class);

Route::resource('delivery-addresses', DeliveryAddressesController::class);

Route::resource('offers', OffersController::class);

Route::resource('orders', OrdersController::class);

Route::resource('order-statuses', OrderStatusesController::class);

Route::resource('payment-modes', PaymentModesController::class);

Route::resource('reviews', ReviewsController::class);

Route::resource('roles', RolesController::class);

Route::resource('seller-products', SellerProductsController::class);

Route::resource('sellers', SellersController::class);

Route::resource('sub-categories', SubCategoriesController::class);
