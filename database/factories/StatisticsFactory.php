<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Statistics;

class StatisticsFactory extends Factory
{
    protected $model=Statistics::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),

            'published_since'=>$this->faker->dateTimeBetween('now', '1 month'),
            'published_untill'=>$this->faker->dateTimeBetween('+1 week', '1 month'),
            'type'=>1,
            'image'=>$this->faker->image('storage/app/public/public/images',640,480, null, false),

        ];
    }

}
