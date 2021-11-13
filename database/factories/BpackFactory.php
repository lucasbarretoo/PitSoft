<?php

namespace Database\Factories;

use App\Models\Bpack;
use Illuminate\Database\Eloquent\Factories\Factory;

class BpackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bpack::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'nmbpack' => 'cadastros',
        //     'nmbpack_mostrar' => 'Cadastros'
        // ];
    }
}
