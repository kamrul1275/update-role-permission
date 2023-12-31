<?php

use App\Http\Controllers\api_controller\AdminController;
use App\Http\Controllers\api_controller\AuthControlller;
use App\Http\Controllers\api_controller\Permission\PermissionController;
use App\Http\Controllers\api_controller\product\ProductController;
use App\Http\Controllers\api_controller\Role\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





// User Authentication
Route::get('/user', [AuthControlller::class, 'index']);

Route::controller(AuthControlller::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});



 Route::middleware('auth:sanctum')->group( function () {
    Route::post('logout', [AuthControlller::class, 'logout']);

    // product part..

    Route::resource('products',ProductController::class);



    
    Route::resource('testing',AdminController::class);





 });


 //});

 // product part..


 Route::resource('roles',RoleController::class);

 Route::resource('permissions',PermissionController::class);


 
