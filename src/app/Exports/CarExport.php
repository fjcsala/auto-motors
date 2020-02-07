<?php

namespace App\Exports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CarExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function query()
    {
        return Car :: where('id', '>', 0);
    }
    
    public function headings(): array
    {
        return [
            'NOME',
            'CATEGORIA',
            'ANO',
            'MODELO',
            'COR',
            'FILIAL',
            'CHASSI',
        ];
    }

    public function map($car): array
    {
        return [
            $car->name,
            $car->category,
            $car->year,
            $car->model,
            $car->color,
            $car->id_branch,
            $car->chassi,
        ];
    }
}