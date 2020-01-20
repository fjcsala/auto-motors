<?php

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch :: create([
            'cnpj'              =>      '16232382000119',
            'ie'                =>      '029626056',
            'social_name'       =>      'Auto Motors do Espírito Santo S/A',
            'fantasy_name'      =>      'Auto Motors',
            'zip_code'          =>      '29106460',
            'address'           =>      'Rua Silva Xavier',
            'number'            =>      585,
            'complement'        =>      'Galpão 26',
            'district'          =>      'Cristóvão Colombo',
            'city'              =>      'Vila Velha',
            'state'             =>      'ES',
            'status'            =>      1
        ]);
    }
}
