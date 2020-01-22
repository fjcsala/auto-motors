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
    }
}