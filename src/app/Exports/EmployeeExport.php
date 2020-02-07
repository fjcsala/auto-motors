<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeeExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        return Employee :: where('id', '>', 0);
    }
    
    public function headings(): array
    {
        return [
            'NOME',
            'CPF',
            'FUNÇÃO',
            'FILIAL',
        ];
    }

    public function map($employee): array
    {
        return [
            $employee->full_name,
            $employee->cpf,
            $employee->function,
            $employee->id_branch,
        ];
    }
}