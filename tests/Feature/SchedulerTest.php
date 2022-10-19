<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Display;
use Illuminate\Testing\Fluent\AssertableJson;
class SchedulerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_displays(){
        $response=$this->get('/api/get_displays/');
        //dd($response);
        $response->assertStatus(200);
    }
    public function test_scheduler(){
        $response=$this->post('/api/get_schedule/2',  ['data'=>[
                        'month'=>07,
                        'year'=>2022
        ]]);
        //dd($response);
        $response->assertStatus(200);
    }

}
