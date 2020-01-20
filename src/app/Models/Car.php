<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = ('car');

    public $timestamps = false;

    public $rules = [
        'name'      =>  'required',
        'model'     =>  'required',
        'category'  =>  'required',
        'year'      =>  'required',
        'color'     =>  'required',
        'chassi'    =>  'required',
        'id_branch' =>  'required'
    ];

    public $errorMessages = [
        'name.required'         =>  'Insira o Nome da montadora.',
        'model.required'        =>  'Insira o Modelo do automóvel.',
        'category.required'     =>  'Insira a Categoria do automóvel.',
        'year.required'         =>  'Insira o Ano do automóvel.',
        'color.required'        =>  'Insira a Cor do automóvel.',
        'chassi.required'       =>  'Insira o Chassi do automóvel.',
        'id_branch.required'    =>  'Selecione a FIlial de montagem do automóvel.'
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