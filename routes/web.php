<?php

use App\Events\PrintSend;
use Illuminate\Support\Facades\Route;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;

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
Route::post('/broadcast', function (){

    //  broadcast(new PrintSend(

    //  ));
});
WebSocketsRouter::webSocket('/my-websocket/app/{appKey}/channel/{channel}', App\CustomWebSocketHandler::class); //co tutaj
