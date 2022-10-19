<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Promotion;
use App\Models\Statistics;
use Carbon\Carbon;

class CleanDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanstats:daily';

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

            $stat=Statistics::create(['promotion_id'=>$promo->id, 'week'=>null, 'day'=>Carbon::now()->subDay(), 'clicks'=>$promo->clicks_today] );
            $stat->save();
            $promo->clicks_today=0;

            $promo->save();
        }
        return 0;
    }
}
