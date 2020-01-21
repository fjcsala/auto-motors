<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = ('branch');

    public $timestamps = false;

    public $rules = [
        'cnpj'          =>  'required',
        'ie'            =>  'required',
        'social_name'   =>  'required',
        'fantasy_name'  =>  'required',
        'zip_code'      =>  'required',
        'address'       =>  'required',
        'number'        =>  'required',
        'complement'    =>  'required',
        'district'      =>  'required',
        'city'          =>  'required',
        'state'         =>  'required'
    ];

    public $errorMessages = [
        'cnpj.required'             =>  'Informe o CNPJ da filial.',
        'ie.required'               =>  'Informe a Inscrição Estadual da filial.',
        'social_name.required'      =>  'Informe a Razão Social da filial.',
        'fantasy_name.required'     =>  'Informe o Nome Fantasia da filial.',
        'zip_code.required'         =>  'Informe o CEP da filial.',
        'address.required'          =>  'Informe o Endereço da filial.',
        'number.required'           =>  'Informe o Número do Endereço da filial.',
        'complement.required'       =>  'Informe o Complemento do Endereço da filial.',
        'district.required'         =>  'Informe o Bairro da filial.',
        'city.required'             =>  'Informe a Cidade da filial.',
        'state.required'            =>  'Informe o Estado da filial.'
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