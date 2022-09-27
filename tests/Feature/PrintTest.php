<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Display;
use Illuminate\Testing\Fluent\AssertableJson;
class DisplayTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function test_display_route()
    // {
    //     $user=User::find(1);
    //     $display=Display::find(1);
    //     $response = $this->actingAs($user)->get("api/getdisplay/{$display->id}");
    //     //dd($response);
    //     $response->assertStatus(200);
    // }
    // public function test_activate_print(){
    //     $response = $this->post('/api/activate_printer',
    //          ['data'=>[
    //             'display_id'=>2,
    //             'user_name'=>'Aga',
    //             'reward_name'=>'nagroda 1',
    //             'print'=>false
    //          ]
    //     ]);
    // //    dd($response);
    //     $response->assertStatus(200);
        // ->assertJson(fn (AssertableJson $json) =>
        //     $json->where('display_id', 2)
        //          ->has('print_file')
        //          ->where('print', true)

        // );
    //}
    public function test_registration(){
        $response = $this->post('/api/register',
        ['data'=>[
           'channel'=>'test_channel',
           'name'=>'Test Display',
           'print'=>false

        ]
        ]);
        //dd($response);
        $response->assertStatus(200);
    }
}
