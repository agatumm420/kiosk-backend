<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Models\Display;

class ListenForStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listenfor:stats';

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
        $displays=Display::all();
        foreach( $displays as $display){
            rRedis::psubscribe(['*'.$display->channel.'.*'], function ($message, $channel) {
                echo $channel;
                echo PHP_EOL;
                echo $message;
                echo PHP_EOL;
            });
        }


    }
}
