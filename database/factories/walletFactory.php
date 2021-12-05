<?php

namespace Database\Factories;
use App\Models\wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class walletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = wallet::class;

    public function definition()
    {
        return [

            'saldo' =>  $this->faker->numberBetween($min = 500, $max = 900)

            //
        ];
    }
}
