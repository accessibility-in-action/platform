<?php

namespace Database\Factories;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $regions = config('regions');

        return [
            'name' => $this->faker->company(),
            'locality' => $this->faker->city(),
            'region' => $regions[$this->faker->numberBetween(0, 12)]
        ];
    }
}
