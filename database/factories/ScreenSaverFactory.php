<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ScreenSaver;

class ScreenSaverFactory extends Factory
{
    protected $model=ScreenSaver::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'image' => $this->faker->image('storage/app/public/public/images',640,480, null, false),

        ];
    }

}
