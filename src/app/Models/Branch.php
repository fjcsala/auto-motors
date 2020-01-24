<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = ('branch');

    public $timestamps = false;

    public $rules = [
        'cnpj'          =>  'required | min: 18',
        'ie'            =>  'required | min: 5',
        'social_name'   =>  'required',
        'fantasy_name'  =>  'required',
        'zip_code'      =>  'required | min: 10',
        'address'       =>  'required',
        'number'        =>  'required',
        'complement'    =>  'required',
        'district'      =>  'required',
        'city'          =>  'required',
        'state'         =>  'required'
    ];

    public $errorMessages = [
        'cnpj.required'             =>  'INFORME O CNPJ DA FILIAL.',
        'cnpj.min'                  =>  'O CNPJ DEVE POSSUIR 18 ALGARISMOS.',
        'ie.required'               =>  'INFORME A INSCRIÇÃO ESTADUAL DA FILIAL.',
        'ie.min'                    =>  'A INSCRIÇÃO ESTADUAL DEVE POSSUIR NO MÍN. 5 ALGARISMOS.',
        'social_name.required'      =>  'INFORME A RAZÃO SOCIAL DA FILIAL.',
        'fantasy_name.required'     =>  'INFORME O NOME FANTASIA DA FILIAL.',
        'zip_code.required'         =>  'INFORME O CEP DA FILIAL.',
        'zip_code.min'              =>  'O CEP DEVE POSSUIR 8 ALGARISMOS.',
        'address.required'          =>  'INFORME O ENDEREÇO DA FILIAL.',
        'number.required'           =>  'INFORME O NÚMERO DO ENDEREÇO DA FILIAL.',
        'complement.required'       =>  'INFORME O COMPLEMENTO DO ENDEREÇO DA FILIAL.',
        'district.required'         =>  'INFORME O BAIRRO DA FILIAL.',
        'city.required'             =>  'INFORME A CIDADE DA FILIAL.',
        'state.required'            =>  'INFORME O ESTADO DA FILIAL.'
    ];

    protected $fillable = [
        'cnpj',
        'ie',
        'social_name',
        'fantasy_name',
        'zip_code',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'state'
    ];

    protected $guarded = [
        '_token',
        'updated_at',
        'created_at'
    ];
}