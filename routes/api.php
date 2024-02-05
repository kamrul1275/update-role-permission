<?php

use App\Http\Controllers\api_controller\AdminController;
use App\Http\Controllers\api_controller\AuthControlller;
use App\Http\Controllers\api_controller\PageController;
use App\Http\Controllers\api_controller\Permission\PermissionController;
use App\Http\Controllers\api_controller\product\ProductController;
use App\Http\Controllers\api_controller\Role\RoleController;
use App\Http\Controllers\api_controller\User\UserController;
use App\Http\Controllers\api_controller\UserMange\UserController as UserMangeUserController;
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

Route::controller(AuthControlller::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});


 Route::middleware('auth:sanctum')->group( function () {
    Route::post('logout', [AuthControlller::class, 'logout']);

    Route::get('/user', [AuthControlller::class, 'index']);

    Route::resource('role_permissions',AdminController::class);



// user 

Route::get('/user/role/access', [UserController::class, 'userRoleAccess']);


 });

 Route::post('/users/{id}/roles/{roleId}', [UserController::class, 'addRole']);

 //});



 // product part..
  // product part..

Route::resource('products',ProductController::class);

Route::get('/products/edit/{id}',[ProductController::class,'editProduct']);

Route::get('/total/products/count', [ProductController::class, 'getTotalProducts']);




 Route::resource('roles',RoleController::class);
 Route::get('/total/role/count', [RoleController::class, 'getTotalRoles']);








 Route::resource('permissions',PermissionController::class);
 Route::get('/total/permission/count', [PermissionController::class, 'getTotalPermissions']);


 
Route::get('/',[PageController::class, 'indexPage']);


// user Manage part

Route::get('/user/info',[UserMangeUserController::class, 'indexPage']);
Route::post('/user/create',[UserMangeUserController::class, 'createPage']);  
Route::get('/user/edit/{id}',[UserMangeUserController::class, 'editPage']);
Route::put('/user/update/{id}',[UserMangeUserController::class, 'updatePage']); 
Route::delete('/user/delete/{id}',[UserMangeUserController::class, 'DeletePage']); 



// total user count
Route::get('/total/user/count', [UserMangeUserController::class, 'getTotalUsers']);
