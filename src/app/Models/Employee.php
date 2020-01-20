<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = ('employee');

    public $timestamps = false;

    public $rules = [
        'cpf'           =>  'required',
        'birth_date'    =>  'required',
        'full_name'     =>  'required',
        'sex'           =>  'required',
        'zip_code'      =>  'required',
        'address'       =>  'required',
        'number'        =>  'required',
        'complement'    =>  'required',
        'district'      =>  'required',
        'city'          =>  'required',
        'state'         =>  'required',
        'id_branch'     =>  'required',
        'function'      =>  'required',
        'salary'        =>  'required',
        'password'      =>  'required'
    ];

    public $errorMessages = [
    	'cpf.required'          =>  'Informe o CPF do funcionário.',
    	'birth_date.required'   =>  'Informe a Data de Nascimento do funcionário.',
    	'full_name.required'    =>  'Informe o Nome Completo do funcionário.',
    	'sex.required'          =>  'Informe o Sexo do funcionário.',
        'zip_code.required'     =>  'Informe o CEP do funcionário.',
        'address.required'      =>  'Informe o Endereço do funcionário.',
        'number.required'       =>  'Informe o Número do Endereço do funcionário.',
        'complement.required'   =>  'Informe o Complemento do Endereço do funcionário.',
        'district.required'     =>  'Informe o Bairro do funcionário.',
        'city.required'         =>  'Informe a Cidade do funcionário.',
        'state.required'        =>  'Informe o Estado do funcionário.',
        'id_branch.required'    =>  'Informe a Filial do funcionário.',
        'function.required'     =>  'Informe a Função do funcionário.',
        'salary.required'       =>  'Informe o Salário do funcionário.',
        'password.required'     =>  'Informe a Senha para acesso ao sistema.'
    ];

    protected $fillable = [
        'cpf',
        'birth_date',
        'full_name',
        'sex',
        'zip_code',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'id_branch',
        'function',
        'salary',
        'password'
    ];

    protected $guarded = [
        '_token',
        'updated_at',
        'created_at'
    ];
}