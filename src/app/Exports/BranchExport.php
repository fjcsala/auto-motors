<?php

namespace App\Exports;

use App\Models\Branch;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BranchExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function query()
    {
        return Branch :: where('id', '>', 0);
    }
    
    public function headings(): array
    {
        return [
            'RAZÃO SOCIAL',
            'CNPJ',
            'IE',
            'CIDADE',
            'UF',
        ];
    }

    public function map($branch): array
    {
        return [
            $branch->social_name,
            $branch->cnpj,
            $branch->ie,
            $branch->city,
            $branch->state,
        ];
    }
}