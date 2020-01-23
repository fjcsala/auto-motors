<?php

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car :: create([
            'chassi'        =>      '9BA.RD08X0.0V.123456',
            'category'      =>      'Sedã Grande',
            'name'          =>      'Corolla',
            'year'          =>      2020,
            'model'         =>      2020,
            'color'         =>      'Branco',
            'id_branch'     =>      1
        ]);

        Car :: create([
            'chassi'        =>      '3LE.NVLND5.G9.PU0842',
            'category'      =>      'Entrada',
            'name'          =>      'Celta',
            'year'          =>      2020,
            'model'         =>      2020,
            'color'         =>      'Preto',
            'id_branch'     =>      2
        ]);

        Car :: create([
            'chassi'        =>      '8AB.S78N7H.ZA.N68365',
            'category'      =>      'Sedã Grande',
            'name'          =>      'Civic',
            'year'          =>      2020,
            'model'         =>      2020,
            'color'         =>      'Prata',
            'id_branch'     =>      3
        ]);

        Car :: create([
            'chassi'        =>      '1PV.AU925Y.AK.P47747',
            'category'      =>      'Sedã Grande',
            'name'          =>      'Jetta',
            'year'          =>      2020,
            'model'         =>      2020,
            'color'         =>      'Vermelho',
            'id_branch'     =>      4
        ]);

        Car :: create([
            'chassi'        =>      '4X5.S453ME.52.SC5021',
            'category'      =>      'SUV',
            'name'          =>      'Compass',
            'year'          =>      2020,
            'model'         =>      2020,
            'color'         =>      'Cinza',
            'id_branch'     =>      5
        ]);
    }
}