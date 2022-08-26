<?php

namespace Database\Factories;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clinic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
        return [
            'code' => generateRandomCode('CNC'),
            'doctor_id' => User::factory(),
            'name'=> $this->faker->name(),
            'describe_specialize'=> $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'signature_text' => $this->faker->name(),
            'signature_image' => $this->faker->imageUrl(),
            'is_display' => 1,
            'mobile' => '+1996'.$this->faker->numerify('#####'),
            'another_mobile' => '+1996'.$this->faker->numerify('#####'),
            'whatsapp_number' => '+1996'.$this->faker->numerify('#####'),
            'logo' => $this->faker->imageUrl(),
            'attachment' => $this->faker->imageUrl(),
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
