<?php

use App\Http\Controllers\AddressTypeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ColorProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryAddressController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\PaymentModeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
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
Route::resource('users',UsersController::class);
