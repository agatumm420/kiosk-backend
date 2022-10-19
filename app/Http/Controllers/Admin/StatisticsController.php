<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Backpack\CRUD\app\Library\Widget;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }
    public function statistics()
    {
        $this->data['title'] = trans('backpack::base.statistics');
        $this->data['breadcrumbs'] = [
            trans('backpack::crud.statistics')     => backpack_url('statistics'),
            trans('backpack::base.statistics') => false,
        ];
        $promo_chart=Widget::make([
            'type'       => 'chart',
            'controller' => \App\Http\Controllers\Admin\Charts\PromotionClicksChartController::class,

        ]);
        $mini_chart=Widget::make([
            'type'       => 'chart',
            'controller' => \App\Http\Controllers\Admin\Charts\MinisClicksChartController::class,

        ]);
        Widget::add([
            'type'    => 'div',
            'class'   => 'row',
            'content' => [$promo_chart, $mini_chart]
        ]);
        // Widget::add($promo_chart)->to('big-row-div');
        // Widget::add($mini_chart)->to('big-row-div');
        return view(backpack_view('statistics'), $this->data);
    }
}
