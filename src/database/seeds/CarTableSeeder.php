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
            'name'          =>      'Auto Motors',
            'model'         =>      'Celta',
            'category'      =>      'Entrada',
            'year'          =>      2020,
            'color'         =>      'Preto',
            'chassi'        =>      '9BARD08X00V123456',
            'id_branch'     =>      1
        ]);
    }
}