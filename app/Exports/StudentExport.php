<?php

namespace App\Exports;

use App\Models\StudentModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return StudentModel::all(['name', 'gender', 'sclass_id']);
    }

    public function headings(): array
    {
        return ['Név', 'Nem', 'Osztály'];
    }
}
