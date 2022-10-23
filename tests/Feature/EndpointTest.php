<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Display;
use Illuminate\Testing\Fluent\AssertableJson;
class EndpointTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_display_route()
    {
        $user=User::find(1);
        $display=Display::find(1);
        $response = $this->actingAs($user)->get("/api/getdisplay/{$display->id}");
       // dd($response);
        $response->assertStatus(200);
    }
    public function test_show(){
        $user=User::find(1);
        $response = $this->actingAs($user)->get('/api/shop/page=1' );
      //dd($response);
        $response->assertStatus(200);
    //     // ->assertJson(fn (AssertableJson $json) =>
        //     $json->where('display_id', 2)
        //          ->has('print_file')
        //          ->where('print', true)

        // );
    }
    // public function test_shop(){
    //     $user=User::find(1);
    //     $response = $this->actingAs($user)->get('/api/shop' );
    //     dd($response);
    //     $response->assertStatus(200);
    // //     // ->assertJson(fn (AssertableJson $json) =>
    //     //     $json->where('display_id', 2)
    //     //          ->has('print_file')
    //     //          ->where('print', true)

    //     // );
    // }
    public function test_gastronomy(){
        $user=User::find(1);
        $response = $this->actingAs($user)->get('/api/gastronomy' );
       //  dd($response);
        $response->assertStatus(200);
        // ->assertJson(fn (AssertableJson $json) =>
        //     $json->where('display_id', 2)
        //          ->has('print_file')
        //          ->where('print', true)

        // );
    }
    // public function test_slugs_shop(){
    //     $user=User::find(1);
    //     $response = $this->actingAs($user)->get('/api/shop/ccc' );
    //     //dd($response);
    //     $response->assertStatus(200);
    //     // ->assertJson(fn (AssertableJson $json) =>
    //     //     $json->where('display_id', 2)
    //     //          ->has('print_file')
    //     //          ->where('print', true)

    //     // );
    // }
    // public function test_slugs_gastronomy(){
    //     $user=User::find(1);
    //     $response = $this->actingAs($user)->get('/api/gastronomy/asprod' );
    //     //dd($response);
    //     $response->assertStatus(200);
    //     // ->assertJson(fn (AssertableJson $json) =>
    //     //     $json->where('display_id', 2)
    //     //          ->has('print_file')
    //     //          ->where('print', true)

    //     // );
    // }
    // public function test_service(){
    //     $user=User::find(1);
    //     $response = $this->actingAs($user)->get('/api/service' );
    //    // dd($response);
    //     $response->assertStatus(200);
    //     // ->assertJson(fn (AssertableJson $json) =>
    //     //     $json->where('display_id', 2)
    //     //          ->has('print_file')
    //     //          ->where('print', true)

    //     // );
    // }
    // public function test_slugs_service(){
    //     $user=User::find(1);
    //     $response = $this->actingAs($user)->get('/api/service/fitness' );
    //     //dd($response);
    //     $response->assertStatus(200);
    //     // ->assertJson(fn (AssertableJson $json) =>
    //     //     $json->where('display_id', 2)
    //     //          ->has('print_file')
    //     //          ->where('print', true)

    //     // );
    // }
    // public function test_plan(){
    //     $user=User::find(1);
    //     $response = $this->actingAs($user)->get('/api/plan/1' );
    //    // dd($response);
    //     $response->assertStatus(200);
    //     // ->assertJson(fn (AssertableJson $json) =>
    //     //     $json->where('display_id', 2)
    //     //          ->has('print_file')
    //     //          ->where('print', true)


    // }
    // public function test_set_socket(){
    //     $user=User::find(1);
    //     $response = $this->actingAs($user)->postJson('/api/set_socketId' ,[
    //         'data'=>[
    //             'channel'=>'display1',
    //             'socketId'=>'werjwiworei'
    //         ]
    //     ]);
    //    // dd($response);
    //     $response->assertStatus(200);
    //     // ->assertJson(fn (AssertableJson $json) =>
    //     //     $json->where('display_id', 2)
    //     //          ->has('print_file')
    //     //          ->where('print', true)


    // }
}
