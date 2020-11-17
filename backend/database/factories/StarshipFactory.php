<?php

namespace Database\Factories;

use App\Models\Starship;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StarshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Starship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        return [
            'name' => $this->faker->company . ' ' . rand(10,100),
            'crew' => rand(10,100000),
            'model' => 'test',
            'image' => 'https://loremflickr.com/g/300/300/starship?v=' . rand(10,100000)
        ];
    }
}
