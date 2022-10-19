<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;
use App\Models\Promotion;

/**
 * Class PromotionClicksChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PromotionClicksChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels([
            'Dzisiaj', 'W tym tygodniu', 'W sumie'
        ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/promotion-clicks'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    protected function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    protected function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    }
   public function getColor($num) {
        $hash = md5('color' . $num); // modify 'color' to get a different palette
        return array(
            hexdec(substr($hash, 0, 2)), // r
            hexdec(substr($hash, 2, 2)), // g
            hexdec(substr($hash, 4, 2))); //b
    }
    public function getColorNumber(){
        return rand(1,255);
    }
    public function data()
    {
        $promotions = Promotion::all();
        function getColor($num) {
            $hash = md5('color' . $num); // modify 'color' to get a different palette
            return array(
                hexdec(substr($hash, 0, 2)), // r
                hexdec(substr($hash, 2, 2)), // g
                hexdec(substr($hash, 4, 2))); //b
        }

        foreach($promotions as $promo){
            $promo_clicks_today=$promo->clicks_today;
            $promo_clicks_week=$promo->clicks_week;
            $promo_clicks_total=$promo->clicks_total;
            $num = rand(1,20);
            list($r,$g,$b) = getColor($num);
            $this->chart->dataset($promo->name, 'bar', [
                        $promo_clicks_today,
                        $promo_clicks_week,
                        $promo_clicks_total
                    ])
                ->color('rgba('.strval($r).','.strval($g).','.strval($b).', 1)');
                // ->backgroundColor('rgba('.strval($r).','.strval($g).','.strval($b).', 1)');
        }

    }
}
