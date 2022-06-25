<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    /**
     * Name of corresponding model
     *
     * @var string
     */

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstname(),
            'lastname' => $this->faker->lastname(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'pokemon', // password
            'remember_token' => Str::random(10),
            'phoneNumber' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'postCode' => $this->faker->postcode(),
            'city' => $this->faker->city(),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
                'archived' => $this->faker->archived(false),
                'g5e1D_roles_id' => $this->faker->g5e1D_roles_id(1),
            ];
        });
    }
}
