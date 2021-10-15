<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Abonne;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbonneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Abonne::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->firstname(),
            'prenom' => $this->faker->lastname(),
            'user_id' => User::pluck('id')->random()
        ];
    }
}
