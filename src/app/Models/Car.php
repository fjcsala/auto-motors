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
        'chassi.required'           =>      'INSIRA O CHASSI DO AUTOMÓVEL.',
        'chassi.min'                =>      'O CHASSI DEVE POSSUIR 17 CARACTERES.',
        'category.required'         =>      'INSIRA A CATEGORIA DO AUTOMÓVEL.',
        'name.required'             =>      'INSIRA O NOME DO AUTOMÓVEL.',
        'year.required'             =>      'INSIRA O ANO DO AUTOMÓVEL.',
        'year.min'                  =>      'O ANO DEVE POSSUIR 4 ALGARISMOS.',
        'model.required'            =>      'INSIRA O MODELO DO AUTOMÓVEL.',
        'model.min'                 =>      'O MODELO DEVE POSSUIR 4 ALGARISMOS.',
        'color.required'            =>      'INSIRA A COR DO AUTOMÓVEL.',
        'id_branch.required'        =>      'INSIRA A FILIAL DE PRODUÇÃO DO AUTOMÓVEL.'
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

    public function branch ()
    {
        return $this -> belongsTo('App\Models\Branch','id_branch');
    }

}