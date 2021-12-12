<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DatabaseController;

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

Route::get('/',[PageController::class, 'ViewLoginPageController']);

Route::post('/handle-login',[LoginController::class, 'HandleLoginContoller']);

Route::get('/home-page',[PageController::class, 'ViewHomePageController']);

Route::get('/handle-logout',[LoginController::class, 'HandleLogoutContoller']);

Route::get('/staff-management',[PageController::class, 'ViewStaffManagementController']);

Route::post('/insert-staff-data',[DatabaseController::class, 'InsertStaffData']);

Route::get('/delete-staff-data/{auto_id}',[DatabaseController::class, 'DeleteStaffData']);

?>
