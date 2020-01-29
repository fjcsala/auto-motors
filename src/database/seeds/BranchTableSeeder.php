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
            'cnpj'              =>      '16.232.382/0001-19',
            'ie'                =>      '02962605-6',
            'social_name'       =>      'Auto Motors do Espírito Santo S/A',
            'fantasy_name'      =>      'Auto Motors',
            'zip_code'          =>      '29.106-460',
            'address'           =>      'Rua Silva Xavier',
            'number'            =>      585,
            'complement'        =>      'Galpão 26',
            'district'          =>      'Cristóvão Colombo',
            'city'              =>      'Vila Velha',
            'state'             =>      'ES',
            'status'            =>      1
        ]);

        Branch :: create([
            'cnpj'              =>      '45.198.107/0001-24',
            'ie'                =>      '831.279.157',
            'social_name'       =>      'Auto Motors de São Paulo S/A',
            'fantasy_name'      =>      'Auto Motors',
            'zip_code'          =>      '13.335-235',
            'address'           =>      'Rua Cora Tommaso Lopes',
            'number'            =>      792,
            'complement'        =>      'Armazém 07',
            'district'          =>      'Jardim Valença',
            'city'              =>      'Indaiatuba',
            'state'             =>      'SP',
            'status'            =>      1
        ]);

        Branch :: create([
            'cnpj'              =>      '51.835.385/0001-48',
            'ie'                =>      '10.325.632-6',
            'social_name'       =>      'Auto Motors de Goiás S/A',
            'fantasy_name'      =>      'Auto Motors',
            'zip_code'          =>      '74.555-515',
            'address'           =>      'Rua T',
            'number'            =>      221,
            'complement'        =>      'Armazém 07',
            'district'          =>      'Vila Ofugi',
            'city'              =>      'Goiânia',
            'state'             =>      'GO',
            'status'            =>      0
        ]);

        Branch :: create([
            'cnpj'              =>      '88.852.468/0001-55',
            'ie'                =>      '46.538.844-2',
            'social_name'       =>      'Auto Motors de Manaus S/A',
            'fantasy_name'      =>      'Auto Motors',
            'zip_code'          =>      '69.037-179',
            'address'           =>      'Rua Litorânea',
            'number'            =>      765,
            'complement'        =>      'Polo Industrial de Manaus - Armazém 447',
            'district'          =>      'Ponta Negra',
            'city'              =>      'Manaus',
            'state'             =>      'AM',
            'status'            =>      1
        ]);

        Branch :: create([
            'cnpj'              =>      '00.612.668/0001-90',
            'ie'                =>      '439.032.679',
            'social_name'       =>      'Auto Motors do Sul S/A',
            'fantasy_name'      =>      'Auto Motors',
            'zip_code'          =>      '89.026-420',
            'address'           =>      'Rua Ourinhos',
            'number'            =>      138,
            'complement'        =>      'Auto Motors',
            'district'          =>      'Progresso',
            'city'              =>      'Blumenau',
            'state'             =>      'SC',
            'status'            =>      1
        ]);
    }
}
