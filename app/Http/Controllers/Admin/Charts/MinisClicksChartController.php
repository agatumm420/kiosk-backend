<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Mini;
use Carbon\Carbon;

/**
 * Class MinisClicksChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MinisClicksChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels([
            'Dzisiaj', 'W tym tygodniu', 'W sumie'
        ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/minis-clicks'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    public function data()
    {
        function getColor($num) {
            $hash = md5('color' . $num); // modify 'color' to get a different palette
            return array(
                hexdec(substr($hash, 0, 2)), // r
                hexdec(substr($hash, 2, 2)), // g
                hexdec(substr($hash, 4, 2))); //b
        }

        $minis=Mini::where('published_since','>', Carbon::now())->get();
        foreach($minis as $mini){
            $num = rand(1,20);
            list($r,$g,$b) = getColor($num);
            $this->chart->dataset($mini->name, 'bar', [
                $mini->clicks_today,
                $mini->clicks_week,
                $mini->clicks_total
            ])
        ->color('rgba('.strval($r).','.strval($g).','.strval($b).', 1)')
        ->backgroundColor('rgba('.strval($r).','.strval($g).','.strval($b).', 1)');
        }

    }
}
