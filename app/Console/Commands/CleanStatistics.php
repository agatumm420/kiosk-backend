<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Modles\Promotion;
use App\Models\Statistics;
use Carbon\Carbon;


class CleanStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanstats:week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $promotions=Promotion::all();
        foreach($promotions as $promo){
            $stat=Statistics::create(['promotion_id'=>$promo->id, 'week'=>Carbon::now()->subWeek(), 'day'=>null, 'clicks'=>$promo->clicks_week] );
            $stat->save();
            $promo->clicks_week=0;
            $promo->save();
        }

        return 0;
    }
}
