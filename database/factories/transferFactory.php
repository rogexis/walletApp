<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\transfer;

class transferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = transfer::class;

    public function definition()
    {   
        return [
            'concepto' => $this->faker->text($maxNbChars = 200),
            'transaccion' => $this->faker->numberBetween($min = 10, $max = 90),
            'wallet_id' => $this->faker->randomDigitNotNull()
            //
        ];
    }
}
