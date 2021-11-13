<?php

namespace Database\Factories;

use App\Models\Bform;
use App\Models\Bpack;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class BformFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bform::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $Bpack = DB::table('bpack')->where('nmbpack', 'sistema')->first();
        // dd($Bpack);
        return [
            'nmbform' => 'bform',
            'nmbform_mostrar' => 'Bform',
            'idbpack' => $Bpack->idbpack
        ];
    }
}
