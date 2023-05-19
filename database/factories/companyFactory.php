<?php

namespace Database\Factories;

use App\Models\company;
use Illuminate\Database\Eloquent\Factories\Factory;

class companyFactory extends Factory
{
    protected $model = company::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'taxNumber' => $this->faker->unique()->numerify('##########'),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
