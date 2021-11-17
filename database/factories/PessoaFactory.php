<?php

namespace Database\Factories;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFactory extends Factory{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pessoa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        return [
            'nmpessoa' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'endereco' => $this->faker->streetAddress,
            'estado' => $this->faker->state,
            'pais' => $this->faker->country,
            'cep' => $this->faker->postcode,
            'cidade' => $this->faker->city
        ];
    }
}
