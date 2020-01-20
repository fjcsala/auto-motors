<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee :: create([
            'cpf'           =>    '12345678900',
            'birth_date'    =>    '1993-11-18',
            'full_name'     =>    'Fábio Sala',
            'sex'           =>    'Masculino',
            'zip_code'      =>    '29700010',
            'address'       =>    'Avenida Getúlio Vargas',
            'number'        =>    145,
            'complement'    =>    'Apartamento 6',
            'district'      =>    'Centro',
            'city'          =>    'Colatina',
            'state'         =>    'ES',
            'id_branch'     =>    1,
            'function'      =>    'Estagiário',
            'salary'        =>    1000.00,
            'password'      =>    Hash :: make(123456),
            'status'        =>    1
        ]);
    }
}
