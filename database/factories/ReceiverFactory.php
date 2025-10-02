<?php

namespace Database\Factories;

use App\Models\Receiver;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receiver>
 */
class ReceiverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Receiver::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'mobile' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'zip_code' => $this->faker->postcode(),
        ];
    }
}
