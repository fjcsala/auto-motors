<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

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
            'cpf'           =>    '123.456.789-00',
            'birth_date'    =>    '1993-11-18',
            'full_name'     =>    'Fábio Sala',
            'sex'           =>    'Masculino',
            'zip_code'      =>    '29.700-010',
            'address'       =>    'Avenida Getúlio Vargas',
            'number'        =>    145,
            'complement'    =>    'Apartamento 6',
            'district'      =>    'Centro',
            'city'          =>    'Colatina',
            'state'         =>    'ES',
            'id_branch'     =>    1,
            'function'      =>    'Estagiário',
            'salary'        =>    123456,
            'password'      =>    md5(123456),
            'status'        =>    1
        ]);
    }
}
