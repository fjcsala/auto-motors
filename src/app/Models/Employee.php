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

    public $updateRules = [
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
    ];

    public $errorMessages = [
    	'cpf.required'          =>  'Informe o CPF do funcionário.',
    	'birth_date.required'   =>  'Informe a DATA DE NASCIMENTO do funcionário.',
    	'full_name.required'    =>  'Informe o NOME COMPLETO do funcionário.',
    	'sex.required'          =>  'Informe o SEXO do funcionário.',
        'zip_code.required'     =>  'Informe o CEP do funcionário.',
        'address.required'      =>  'Informe o ENDEREÇO do funcionário.',
        'number.required'       =>  'Informe o NÚMERO do Endereço do funcionário.',
        'complement.required'   =>  'Informe o COMPLEMENTO do Endereço do funcionário.',
        'district.required'     =>  'Informe o BAIRRO do funcionário.',
        'city.required'         =>  'Informe a CIDADE do funcionário.',
        'state.required'        =>  'Informe o ESTADO do funcionário.',
        'id_branch.required'    =>  'Informe a FILIAL do funcionário.',
        'function.required'     =>  'Informe a CARGO do funcionário.',
        'salary.required'       =>  'Informe o SALÁRIO do funcionário.',
        'password.required'     =>  'Informe a SENHA para acesso ao sistema.'
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