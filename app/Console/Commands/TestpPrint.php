<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestpPrint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:print';

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
        $response=Http::post('http://galaxyapp.galaxy-centrum.pl/api/activate_printer',['data'=>[
            'display_id'=>2,
            'user_name'=>'Aga',
            'reward_name'=>'nagroda 1',
            'print'=>false
         ]]);
         dd($response);
        return 0;
    }
}
