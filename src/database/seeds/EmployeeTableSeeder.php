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
            'password'      =>    md5(12345678),
            'status'        =>    1
        ]);

        Employee :: create([
            'cpf'           =>    '926.778.828-09',
            'birth_date'    =>    '1979-02-26',
            'full_name'     =>    'Noah Francisco Nascimento',
            'sex'           =>    'Masculino',
            'zip_code'      =>    '13.061-302',
            'address'       =>    'Rua Pintassilgo',
            'number'        =>    124,
            'complement'    =>    'Apartamento 203',
            'district'      =>    'Vila Padre Manoel de Nóbrega',
            'city'          =>    'Campinas',
            'state'         =>    'SP',
            'id_branch'     =>    2,
            'function'      =>    'Gerente de Produção',
            'salary'        =>    9819.45,
            'password'      =>    md5(12345678),
            'status'        =>    1
        ]);

        Employee :: create([
            'cpf'           =>    '635.041.081-50',
            'birth_date'    =>    '1963-03-19',
            'full_name'     =>    'Raimundo Calebe Nascimento',
            'sex'           =>    'Masculino',
            'zip_code'      =>    '74.960-690',
            'address'       =>    'Rua R 12',
            'number'        =>    767,
            'complement'    =>    'Casa A23',
            'district'      =>    'Parque Ibirapuera',
            'city'          =>    'Aparecida de Goiânia',
            'state'         =>    'GO',
            'id_branch'     =>    3,
            'function'      =>    'Montador',
            'salary'        =>    2326.48,
            'password'      =>    md5(12345678),
            'status'        =>    0
        ]);

        Employee :: create([
            'cpf'           =>    '081.474.053-75',
            'birth_date'    =>    '1992-04-09',
            'full_name'     =>    'Ayla Vera Emily Ramos',
            'sex'           =>    'Feminino',
            'zip_code'      =>    '69.057-089',
            'address'       =>    'Rua Antioquia',
            'number'        =>    206,
            'complement'    =>    'S/C',
            'district'      =>    'Adrianópolis',
            'city'          =>    'Manaus',
            'state'         =>    'AM',
            'id_branch'     =>    4,
            'function'      =>    'Auxiliar Administrativo',
            'salary'        =>    2497.57,
            'password'      =>    md5(12345678),
            'status'        =>    1
        ]);

        Employee :: create([
            'cpf'           =>    '477.085.369-60',
            'birth_date'    =>    '1953-11-14',
            'full_name'     =>    'Diego Matheus da Mota',
            'sex'           =>    'Masculino',
            'zip_code'      =>    '89.226-566',
            'address'       =>    'Rua Perseus',
            'number'        =>    701,
            'complement'    =>    'Apartamento 202',
            'district'      =>    'Jardim Paraíso',
            'city'          =>    'Joinville',
            'state'         =>    'SC',
            'id_branch'     =>    5,
            'function'      =>    'Supervisor de Linha de Montagem',
            'salary'        =>    13948.76,
            'password'      =>    md5(12345678),
            'status'        =>    1
        ]);
    }
}
