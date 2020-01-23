<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = ('car');

    public $timestamps = false;

    public $rules = [
        'chassi'    =>  'required',
        'category'  =>  'required',
        'name'      =>  'required',
        'year'      =>  'required',
        'model'     =>  'required',
        'color'     =>  'required',
        'id_branch' =>  'required'
    ];

    public $errorMessages = [
        'chassi.required'       =>  'Insira o CHASSI do automóvel.',
        'category.required'     =>  'Insira a CATEGORIA do automóvel.',
        'name.required'         =>  'Insira o NOME do automóvel.',
        'year.required'         =>  'Insira o ANO do automóvel.',
        'model.required'        =>  'Insira o MODELO do automóvel.',
        'color.required'        =>  'Insira a COR do automóvel.',
        'id_branch.required'    =>  'Selecione a FILIAL de montagem do automóvel.'
    ];

    protected $fillable = [
        'name',
        'model',
        'category',
        'year',
        'color',
        'chassi',
        'id_branch'
    ];

    protected $guarded = [
        '_token',
        'updated_at',
        'created_at'
    ];

}