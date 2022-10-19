<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('display', 'DisplayCrudController');
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('scheduler', 'SchedulerController@scheduler');
    Route::get('statistics', 'StatisticsController@statistics');
    Route::crud('slide-show', 'SlideShowCrudController');
    Route::crud('screen-saver', 'ScreenSaverCrudController');
    Route::crud('mini', 'MiniCrudController');
    Route::get('charts/online-displays', 'Charts\OnlineDisplaysChartController@response')->name('charts.online-displays.index');
    Route::get('charts/promotion-clicks', 'Charts\PromotionClicksChartController@response')->name('charts.promotion-clicks.index');
    Route::get('charts/minis-clicks', 'Charts\MinisClicksChartController@response')->name('charts.minis-clicks.index');

}); // this should be the absolute last line of this file
