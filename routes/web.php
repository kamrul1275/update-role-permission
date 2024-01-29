<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Models\Role_Permission;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {




//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');






Route::get('/dashboard',[HomeController::class,'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[HomeController::class,'homePage'])->name('home.user');


Route::get('/gate/create',[HomeController::class,'CreateGate'])->name('create.gate');

Route::get('/role/request/',[HomeController::class,'roleRequest'])->name('role.request');



Route::post('/role/request/store',[HomeController::class,'roleRequestStore'])->name('role.request.store');


Route::get('/role/pages/',[HomeController::class,'rolePages'])->name('role.pages');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// backend part strat

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::post('post-login', [AdminController::class, 'AdminPostLogin'])->name('admin.login.post');









Route::middleware('backend')->group( function(){




    //Route::post('/admin/login',[AdminController::class,'AdminLogin']);
    Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout');
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');



// Admin Pendding Or Approval System

Route::get('/admin/role/pendding', [AdminController::class, 'rolePending'])->name('role.Pending');
Route::get('/admin/role/pendding/store/{id}', [AdminController::class, 'peddingApproval'])->name('role.Pending.store');


Route::get('/admin/role/approval',[AdminController::class,'roleApproval'])->name('role.Approval');
Route::get('/admin/role/approval/store/{id}',[AdminController::class,'approvePendding'])->name('role.Approval.store');






       // Role part...
       Route::get('/role/create', [RoleController::class, 'Create'])->name('role.create');
       Route::post('/role/store', [RoleController::class, 'Store'])->name('role.store');





       //Role part...
       Route::get('/role/all', [RoleController::class, 'RoleIndex'])->name('role.index.all');
       Route::get('/role/delete/{id}', [RoleController::class, 'Delete'])->name('role.delete');


// gate method ,,,


       Route::get('/gate',[RoleController::class,'indexx'])->name('index.gate');





       //permission....
       Route::get('/permission', [PermissionController::class, 'Index'])->name('permission.index');


       // permission part

       Route::get('/permission/create/role', [PermissionController::class, 'CreatePermission'])->name('create.permission.role');

       Route::post('/permission/store', [PermissionController::class, 'Store'])->name('permission.store');
       Route::get('/permission/delete/{id}', [PermissionController::class, 'Delete'])->name('permission.delete');


       Route::get('/permission/view', [PermissionController::class, 'permissionView'])->name('permission.view');
       Route::get('/permission/create', [PermissionController::class, 'PermissionCreate'])->name('permission.create');
       Route::get('/permission/edit', [PermissionController::class, 'permissionEdit'])->name('permission.edit');
       Route::get('/permission/delete', [PermissionController::class, 'permissionDelete'])->name('permission.delete');


// post part


Route::get('/all/post',[PostController::class,'IndexPost'])->name('index.post');

Route::get('/create/post',[PostController::class,'createPost'])->name('create.post');

Route::post('/store/post',[PostController::class,'storePost'])->name('store.post');



Route::get('/edit/post/{id}',[PostController::class,'editPost'])->name('edit.post');


Route::get('/delete/post/{post}',[PostController::class,'destroy'])->name('delete.post');




// product part....

Route::get('/all/product',[ProductController::class,'index'])->name('index.product');




  ###### User Mnage Part..............


  Route::get('/all/user',[AdminController::class,'userIndex'])->name('all.user.manage');


  Route::get('/create/user',[AdminController::class,'userCreate'])->name('create.user.manage');


  Route::post('/store/user',[AdminController::class,'UserStoreM'])->name('store.usermanage');


  Route::get('/edit/user/{id}',[AdminController::class,'userEdit'])->name('edit.usermanage');  

//   Route::get('/update/user/{id}',[AdminController::class,'userUpdate'])->name('update.usermanage');  

  Route::get('/delete/user/{id}',[AdminController::class,'userDelete'])->name('delete.usermanage');


});

