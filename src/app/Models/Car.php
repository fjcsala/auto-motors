<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = ('car');

    public $timestamps = false;

    public $rules = [
        'chassi'        =>      'required | min: 20',
        'category'      =>      'required',
        'name'          =>      'required',
        'year'          =>      'required | min: 4',
        'model'         =>      'required | min: 4',
        'color'         =>      'required',
        'id_branch'     =>      'required'
    ];

    public $errorMessages = [
        'chassi.required'           =>      'Insira o CHASSI do automóvel.',
        'chassi.min'                =>      'O CHASSI deve possuir 17 caracteres.',
        'category.required'         =>      'Insira a CATEGORIA do automóvel.',
        'name.required'             =>      'Insira o NOME do automóvel.',
        'year.required'             =>      'Insira o ANO do automóvel.',
        'year.min'                  =>      'O ANO deve possuir 4 algarismos.',
        'model.required'            =>      'Insira o MODELO do automóvel.',
        'model.min'                 =>      'O MODELO deve possuir 4 algarismos.',
        'color.required'            =>      'Insira a COR do automóvel.',
        'id_branch.required'        =>      'Selecione a FILIAL de montagem do automóvel.'
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