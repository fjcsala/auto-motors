<?php

use App\Models\Ie;
use Illuminate\Database\Seeder;

class IeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // uf
        $uf = array (
            'AC',
            'AL',
            'AP',
            'AM',
            'BA',
            'CE',
            'DF',
            'ES',
            'GO',
            'MA',
            'MT',
            'MS',
            'MG',
            'PA',
            'PB',
            'PR',
            'PE',
            'PI',
            'RJ',
            'RN',
            'RS',
            'RO',
            'RR',
            'SC',
            'SP',
            'SE',
            'TO'
        );

        // state_name
        $state_name = array (
            'Acre',
            'Alagoas',
            'Amapá',
            'Amazonas',
            'Bahia',
            'Ceará',
            'Distrito Federal',
            'Espírito Santo',
            'Goiás',
            'Maranhão',
            'Mato Grosso',
            'Mato Grosso do Sul',
            'Minas Gerais',
            'Pará',
            'Paraíba',
            'Paraná',
            'Pernambuco',
            'Piauí',
            'Rio de Janeiro',
            'Rio Grande do Norte',
            'Rio Grande do Sul',
            'Rondônia',
            'Roraima',
            'Santa Catarina',
            'São Paulo',
            'Sergipe',
            'Tocantins'
        );

        // ie_mask
        $ie_mask = array(
            /* AC => */ '00.000.000/000-00',
            /* AL => */ '000000000',
            /* AP => */ '000000000',
            /* AM => */ '00.000.000-0',
            /* BA => */ '000000-00',
            /* CE => */ '00000000-0',
            /* DF => */ '00000000000-00',
            /* ES => */ '00000000-0',
            /* GO => */ '00.000.000-0',
            /* MA => */ '00000000-0',
            /* MT => */ '0000000000-0',
            /* MS => */ '00000000-0',
            /* MG => */ '000.000.000/0000',
            /* PA => */ '00-000000-0',
            /* PB => */ '00000000-0',
            /* PR => */ '000.00000-00',
            /* PE => */ '0000000-00',
            /* PI => */ '00000000-0',
            /* RJ => */ '00.000.00-0',
            /* RN => */ '00.000.000-0',
            /* RS => */ '000/0000000',
            /* RO => */ '0000000000000-0',
            /* RR => */ '00000000-0',
            /* SP => */ '000.000.000.000',
            /* SC => */ '000.000.000',
            /* SE => */ '00000000-0',
            /* TO => */ '0000000000-0',
        );

        for ($i = 0; $i < sizeof($uf); $i ++)
        {
            Ie :: create([
                'uf'         => $uf[$i],
                'state_name' => $state_name[$i],
                'ie_mask'    => $ie_mask[$i]
            ]);
        }
    }
}