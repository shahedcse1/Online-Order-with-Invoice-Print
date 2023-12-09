<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\API\UserController;
use App\Http\Controllers\V1\API\TtTypeController;
use App\Http\Controllers\V1\API\PgTtController;
use App\Http\Controllers\V1\API\UserOnRequestController;
use App\Http\Controllers\V1\API\PgTtLogController;




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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

//     return $request->user();

// });

// Route::controller(UserController::class)->group(function(){

//     Route::post('login','loginUser');

// });

Route::post('/login', [UserController::class, 'userLogin'])->name('api.user.login');

Route::middleware('auth:api')->group(function () {

    Route::get('/user', [UserController::class, 'userInformation'])->name('user.information');

    Route::post('/change-user-password', [UserController::class, 'changePassword'])->name('change.user.password');

    Route::get('/logout', [UserController::class, 'userLogout'])->name('user.logout');

    Route::get('/all-tt-type', [TtTypeController::class, 'allTtType'])->name('api.all.tt.type');

    Route::post('/user-request-data', [UserOnRequestController::class, 'onRequestData'])->name('api.on.request.data');

    Route::post('/user-profile-update', [UserController::class, 'userProfileUpdate'])->name('api.user.profile.update');

    Route::post('/pg-tt-current-status', [PgTtLogController::class, 'pgTtCurrentStatus'])->name('api.pg.tt.current.status');

    Route::get('/pg-tt/{userId?}/{status?}', [PgTtController::class, 'allPgTt'])->name('api.all.pg.tt');


});


