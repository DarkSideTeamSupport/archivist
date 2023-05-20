<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'surname' => fake()->lastName(),
            'name' => fake()->firstName(),
            'patronymic' => 'Иванович',
            'login' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->freeEmail(),
            'password' => Hash::make('123456'), // password
            'group_id' => Group::all()->random()->id,
            'course' => random_int(1,4),
            'position_id' => 2,
            'status_id' => 1,
            'role_id' => 2,
        ];
    }
}
