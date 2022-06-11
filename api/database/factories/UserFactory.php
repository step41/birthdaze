<?php

namespace Database\Factories;
 
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
 
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName'             => $this->faker->firstName(),
            'lastName'              => $this->faker->lastName(),
            'email'                 => $this->faker->unique()->safeEmail(),
            'middleName'            => $this->faker->lastName(),
            'password'              => \Illuminate\Support\Facades\Hash::make('test-password'),
            'address'               => $this->faker->address(),
            'zipCode'               => $this->faker->postcode(),
            'username'              => $this->faker->numerify('user#####'),
            'city'                  => $this->faker->city(),
            'state'                 => $this->faker->state(),
            'country'               => $this->faker->country(),
            'phone'                 => $this->faker->phoneNumber(),
            'mobile'                => $this->faker->phoneNumber(),
            'role'                  => \App\Models\User::BASIC_ROLE,
            'isActive'              => rand(0, 1),
            'profileImage'          => $this->faker->imageUrl('100')
        ];
    }
}