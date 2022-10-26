<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserReceiptsController;
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

Route::group(['middleware' => 'auth'], function(){
	Route::get('/dashboard', function () {

      return view('welcome');
    });
    
   
    Route::get('logout',[LoginController::class,'logout'])->name('logout');

	Route::get('/groups', [UserGroupsController::class,'index']);
	Route::get('/groups/create', [UserGroupsController::class,'create']);
	Route::post('/groups', [UserGroupsController::class,'store']);
	Route::delete('/groups/{id}', [UserGroupsController::class,'destroy']);

	// Route::get('/users', [UsersController::class,'index']);
	// Route::get('/users/{id}', [UsersController::class,'show']);
	// Route::get('/users/create', [UsersController::class,'create']);
	// Route::post('/users', [UsersController::class,'store']);
	// Route::get('/users/{id}/edit', [UsersController::class,'edit']);
	// Route::put('/users/{id}', [UsersController::class,'update']);
	// Route::delete('/users/{id}', [UsersController::class,'destroy']);

	Route::resource('/users', UsersController::class);

	Route::get('users/{id}/sales', [UserSalesController::class,'index'])->name('user.sales');
	Route::get('users/{id}/purchases', [UserPurchasesController::class,'index'])->name('user.purchases');

	Route::get('users/{id}/payments', [UserPaymentsController::class,'index'])->name('user.payments');
	Route::post('users/{id}/payments', [UserPaymentsController::class,'store'])->name('user.payments.store');

    Route::delete('users/{id}/payments/{payment_id}', [UserPaymentsController::class,'destroy'])->name('user.payments.destroy');


	Route::get('users/{id}/receipts', [UserReceiptsController::class,'index'])->name('user.receipts');





	Route::resource('/categories', CategoriesController::class, ['except' => ['show']] );

	Route::resource('/products', ProductsController::class);
});

 Route::get('login',[LoginController::class,'login'])->name('login');

 Route::post('login',[LoginController::class,'authenticate'])->name('login.confirm');



