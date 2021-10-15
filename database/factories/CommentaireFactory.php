<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Commentaire;
use App\Models\Publication;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commentaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'publications_id'=>Publication::pluck('id')->random(),
            'contenu' => $this->faker->paragraph(),

        ];
    }
}
