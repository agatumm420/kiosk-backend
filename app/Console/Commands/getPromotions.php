<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Promotion;
class getPromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:promotions';

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
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/promotion');
        $promo_array=json_decode($response);
        foreach($promo_array->data as $promo_duos){
           // dd($promo_duos);
           // foreach($promo_duos as $promo_duo){

                foreach($promo_duos as $promo){
                    //dd($promo);
                    $promotion= Promotion::firstOrNew(["id"=>$promo->id]);
                    $promotion->name=$promo->name;
                    $promotion->src=$promo->src;
                    $promotion->slug=$promo->slug;
                    $promotion->save();
                   // dd($promotion);
                }

            //}

        }

        return 0;
    }
}
