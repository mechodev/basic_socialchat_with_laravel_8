<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Messages;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Messages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contenu'=>$this->faker->paragraph(),
            'sender_id' => User::pluck('id')->random(),
            'receiver_id'=>User::pluck('id')->random(),
        ];
    }
}
