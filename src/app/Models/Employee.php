<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $table = ('employee');

    public $timestamps = false;

    public $rules = [
        'cpf'           =>  'required | min: 14',
        'birth_date'    =>  'required | min: 10',
        'full_name'     =>  'required',
        'sex'           =>  'required',
        'zip_code'      =>  'required | min: 10',
        'address'       =>  'required',
        'number'        =>  'required',
        'complement'    =>  'required',
        'district'      =>  'required',
        'city'          =>  'required',
        'state'         =>  'required',
        'id_branch'     =>  'required',
        'function'      =>  'required',
        'salary'        =>  'required',
        'password'      =>  'required | min: 8'
    ];

    public $updateRules = [
        'cpf'           =>  'required | min: 14',
        'birth_date'    =>  'required | min: 10',
        'full_name'     =>  'required',
        'sex'           =>  'required',
        'zip_code'      =>  'required | min: 10',
        'address'       =>  'required',
        'number'        =>  'required',
        'complement'    =>  'required',
        'district'      =>  'required',
        'city'          =>  'required',
        'state'         =>  'required',
        'id_branch'     =>  'required',
        'function'      =>  'required',
        'salary'        =>  'required',
    ];

    public $loginRules = [
        'cpf'           =>  'required | min: 14',
        'password'      =>  'required | min: 8'
    ];

    public $errorMessages = [
        'cpf.required'          =>  'INFORME O CPF DO FUNCIONÁRIO.',
        'cpf.min'               =>  'O CPF DEVE CONTER 11 ALGARISMOS.',
        'birth_date.required'   =>  'INFORME A DATA DE NASCIMENTO DO FUNCIONÁRIO.',
        'birth_date.min'        =>  'A DATA DE NASCIMENTO DEVE CONTER 8 ALGARISMOS.',
    	'full_name.required'    =>  'INFORME O NOME COMPLETO DO FUNCIONÁRIO.',
    	'sex.required'          =>  'INFORME O SEXO DO FUNCIONÁRIO.',
        'zip_code.required'     =>  'INFORME O CEP DO FUNCIONÁRIO.',
        'zip_code.min'          =>  'O CEP DEVE CONTER 8 ALGARISMOS.',
        'address.required'      =>  'INFORME O ENDEREÇO DO FUNCIONÁRIO.',
        'number.required'       =>  'INFORME O NÚMERO DO ENDEREÇO DO FUNCIONÁRIO.',
        'complement.required'   =>  'INFORME O COMPLEMENTO DO ENDEREÇO DO FUNCIONÁRIO.',
        'district.required'     =>  'INFORME O BAIRRO DO FUNCIONÁRIO.',
        'city.required'         =>  'INFORME A CIDADE DO FUNCIONÁRIO.',
        'state.required'        =>  'INFORME O ESTADO DO FUNCIONÁRIO.',
        'id_branch.required'    =>  'INFORME A FILIAL DO FUNCIONÁRIO.',
        'function.required'     =>  'INFORME O CARGO DO FUNCIONÁRIO.',
        'salary.required'       =>  'INFORME O SALÁRIO DO FUNCIONÁRIO.',
        'password.required'     =>  'INFORME A SENHA PARA ACESSO AO SISTEMA.',
        'password.min'          =>  'A SENHA DEVE CONTER 8 CARACTERES.'
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

    public function branch ()
    {
        return $this -> belongsTo('App\Models\Branch','id_branch');
    }
}