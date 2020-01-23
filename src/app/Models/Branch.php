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
        'ie.required'               =>  'Informe a INSCRIÇÃO ESTADUAL da filial.',
        'social_name.required'      =>  'Informe a RAZÃO SOCIAL da filial.',
        'fantasy_name.required'     =>  'Informe o NOME FANTASIA da filial.',
        'zip_code.required'         =>  'Informe o CEP da filial.',
        'address.required'          =>  'Informe o ENDEREÇO da filial.',
        'number.required'           =>  'Informe o NÚMERO do endereço da filial.',
        'complement.required'       =>  'Informe o COMPLEMENTO do endereço da filial.',
        'district.required'         =>  'Informe o BAIRRO da filial.',
        'city.required'             =>  'Informe a CIDADE da filial.',
        'state.required'            =>  'Informe o ESTADO da filial.'
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