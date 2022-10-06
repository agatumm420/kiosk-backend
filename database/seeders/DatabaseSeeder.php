<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Display;
use App\Models\SlideShow;
use App\Models\ScreenSaver;
//use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $user=User::create(['name'=>'Aga', 'email'=>'agnieszkatumm@gmail.com', 'password'=>'password']);
         //$adminRole = Role::create(['guard_name' => 'web', 'name' => 'admin']);
        $user = User::create([
            'name'          => 'SOFINE',
            'email'         => 'agnieszka@sofine.pl',
            'password'      => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        //$user->assignRole($adminRole);
        // SlideShow::factory(2)->create();
        // ScreenSaver::factory(2)->create();
        // $show1=SlideShow::find(1);
        // $show1->screen_savers()->attach(1);
        // $show2=SlideShow::find(2);
        // $show2->screen_savers()->attach(2);

        // Display::factory(1)->create();

        // Display::create([
        //     'name'=>'display1',
        //     'channel'=>'display1',
        //     'print'=>false,
        //     'slide_show_id'=>2
        // ]);
    }
}
