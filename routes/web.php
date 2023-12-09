<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleModuleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ExcelFileController;
use App\Http\Controllers\PDF\PrintInvoiceController;
use Illuminate\Support\Facades\Auth;

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

    return redirect('/en/admin/login');

});


Auth::routes(['register' => false]);

Route::get('/{locale?}/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');

Route::group(
    ['prefix' => '/{locale?}/admin', 'middleware' => 'auth'],
    function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::get('/role', [RoleController::class, 'index'])->name('all.role')->middleware('can:view-role');

        Route::get('/role/create', [RoleController::class, 'create'])->name('role.create')->middleware('can:create-role');

        Route::post('/role/store', [RoleController::class, 'store'])->name('role.store')->middleware('can:create-role');

        Route::get('/role/edit/{role}', [RoleController::class, 'edit'])->name('role.edit')->middleware('can:update-role');

        Route::put('/role/update/{role}', [RoleController::class, 'update'])->name('role.update')->middleware('can:update-role');

        Route::delete('/role/delete/{role}', [RoleController::class, 'delete'])->name('role.delete')->middleware('can:delete-role');

        Route::get('/deleted/role/{role}', [RoleController::class, 'deleteData'])->name('deleted.role.data')->middleware('can:delete-role');



        /* User Management */

        Route::get('/user', [UserController::class, 'view'])->name('all.user')->middleware('can:view-user');

        Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('can:create-user');

        Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware('can:create-user');

        Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('can:update-user');

        Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update')->middleware('can:update-user');

        Route::delete('/user/delete/{user}', [UserController::class, 'delete'])->name('user.delete')->middleware('can:delete-user');

        // Role Module //

        Route::get('/role_module', [RoleModuleController::class, 'index'])->name('all.role_module')->middleware('can:view-role-module');

        Route::post('/role_module/store', [RoleModuleController::class, 'store'])->name('role_module.store')->middleware('can:create-role-module');

        Route::get('/role_module/edit/{roleModule}', [RoleModuleController::class, 'edit'])->name('role_module.edit')->middleware('can:update-role-module');

        Route::post('/role_module/update/{roleModule}', [RoleModuleController::class, 'update'])->name('role_module.update')->middleware('can:update-role-module');

        Route::delete('/role_module/delete/{roleModule}', [RoleModuleController::class, 'delete'])->name('role_module.delete')->middleware('can:delete-role-module');


        /* Profile Route */

        Route::get('/inactive', [ProfileController::class, 'userInactive'])->name('user.inactive');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('password.edit');

        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('user.password.update');

        // report


        /* Order Route */

        Route::get('/all/orders', [OrderController::class, 'allOrderData'])->name('all.orders')->middleware('can:view-order');

        Route::get('/all/orders/test', [OrderController::class, 'allOrderDataTest'])->name('all.orders.test')->middleware('can:view-order');

        Route::post('/order/store', [OrderController::class, 'store'])->name('order.store')->middleware('can:create-order');

        Route::get('/order/edit/{order}', [OrderController::class, 'edit'])->name('order.edit')->middleware('can:update-order');

        Route::post('/order/update/{order}', [OrderController::class, 'update'])->name('order.update')->middleware('can:update-order');

        Route::get('/order/data/{order}', [OrderController::class, 'orderData'])->name('order.data')->middleware('can:update-order');

        Route::delete('/order/delete/{order}', [OrderController::class, 'delete'])->name('user.delete')->middleware('can:delete-order');

        Route::get('/download/order', [OrderController::class, 'downloadOrder'])->name('download.order')->middleware('can:view-order');

        Route::get('/search-order', [OrderController::class, 'searchOrder'])->name('search.order')->middleware('can:view-order');

        Route::get('/sample/excel-file-download', [OrderController::class, 'sampleExcelFileDownload'])->name('sample.excel.file')->middleware('can:view-order');


        /* Print Invoice Route */

        Route::post('/print/invoice', [PrintInvoiceController::class, 'index'])->name('print.invoice')->middleware('can:view-order');


        /* Excel Route */


        Route::get('/excel-file', [ExcelFileController::class, 'index'])->name('excel.file')->middleware('can:view-excel-file');

        Route::post('/order/excel/upload', [ExcelFileController::class, 'uploadData'])->name('excel.upload')->middleware('can:create-excel-file');

    }
);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
