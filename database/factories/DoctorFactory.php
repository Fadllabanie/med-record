<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Str;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
        return [
            'code' => generateRandomCode('DOC'),
            'user_id' => User::factory(),
            'specialization_id' => $this->faker->randomElement([1,2]),
            'country_id' => 1,
            'city_id' =>$this->faker->randomElement([1,2]),
            'full_name'=> $this->faker->name(),
            'mobile' => '+1996'.$this->faker->numerify('#####'),
            'birthday' => now()->subMonth($this->faker->randomElement([22,44,55,66,77])),
            'gender'=>$this->faker->randomElement(['male','female']),
            'lng' =>$this->faker->latitude(),
            'lat' => $this->faker->latitude(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
