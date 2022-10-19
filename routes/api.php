<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PrintFileController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\MiniController;
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
Route::get('/get_displays', [DisplayController::class, 'get_displays']);
Route::post('/get_schedule/{display}', [DisplayController::class ,'get_schedule']);
Route::post('/set_socketId', [DisplayController::class ,'set_socketId']);
Route::get('/shop/page={page}', [ShopController::class , 'show']);
Route::get('/shop/{slug}', [ShopController::class , 'shop_slug']);
Route::get('/gastronomy', [ShopController::class , 'gastronomy']);
Route::get('/gastronomy/{slug}', [ShopController::class , 'gastronomy_slug']);
Route::get('/service', [ShopController::class , 'service']);
Route::get('/service/{slug}', [ShopController::class , 'service_slug']);
Route::get('/plan/{kiosk}', [ShopController::class , 'plan']);
Route::get('/stop_print/{print_file}', [PrintFileController::class, 'stop_print']);
Route::post('/printer_error/{channel}', [ErrorController::class, 'printer_error']);
Route::get('/add_to_promotion/{promotion}', [PromotionController::class, 'add_clicks']);
Route::get('/add_to_mini/{mini}', [MiniController::class, 'add_clicks']);

