<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });get_slide_show
//register_display
Route::post('/register', [DisplayController::class , 'register_display']);
Route::get('/getdisplay/{display}', [DisplayController::class, 'get_slide_show']);
Route::post('/activate_printer', [DisplayController::class , 'activate_and_print']);
Route::post('/get_slides/{display}', [DisplayController::class , 'get_slide_show']);
Route::get('/shop/page={page}', [ShopController::class , 'show']);
Route::get('/shop/{slug}', [ShopController::class , 'shop_slug']);
Route::get('/gastronomy', [ShopController::class , 'gastronomy']);
Route::get('/gastronomy/{slug}', [ShopController::class , 'gastronomy_slug']);
Route::get('/service', [ShopController::class , 'service']);
Route::get('/service/{slug}', [ShopController::class , 'service_slug']);
Route::get('/plan/{kiosk}', [ShopController::class , 'plan']);
