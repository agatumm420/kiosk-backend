<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Display;

class DisplayFactory extends Factory
{
    protected $model=Display::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'channel' => $this->faker->name(),
            'print' => false,
            'slide_show_id' => $this->faker->numberBetween(1,2),

        ];
    }

}
