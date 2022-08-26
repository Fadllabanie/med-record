<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
      
       
        return [
            'code' => generateRandomCode('PTN'),
            'doctor_id' => $this->faker->numberBetween($min =1, $max = 50),
            'country_id' => 1,
            'city_id' => $this->faker->randomElement([1,2]),
            'full_name'=> $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile' => '+1996'.$this->faker->numerify('#####'),
            'insurance_number' => '+1996'.$this->faker->numerify('#####'),
            'birthday' => now()->subMonth($this->faker->randomElement([22,44,55,66,77])),
            'gender'=>$this->faker->randomElement(['male','female']),
            'lng' =>$this->faker->latitude(),
            'lat' => $this->faker->latitude(),
            'avatar' => $this->faker->imageUrl(),
            'blood_type' => $this->faker->randomElement(['A+','O','A-','AB']),
            'allergy'=> $this->faker->unique()->randomNumber($nbDigits = 4),
            'immunity'=> $this->faker->unique()->randomNumber($nbDigits = 4),
            'chronic_diseases'=> $this->faker->unique()->randomNumber($nbDigits = 4),
            'surgery'=> $this->faker->unique()->randomNumber($nbDigits = 4),
            'note'=> $this->faker->unique()->randomNumber($nbDigits = 4),
            'last_visit'=> now()->subMonth($this->faker->randomElement([1,2])),
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
