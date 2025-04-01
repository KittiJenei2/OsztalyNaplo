<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentModel;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = array();

        $handle = fopen(public_path('students.txt'), 'r');

        while (($line = fgets($handle)) !== false)
        {
            $data = explode(';',trim($line));

            $students[] = [
                'name' => $data[0] ?? null,
                'gender' => $data[1] ?? null,
                'sclass_id' => $data[2] ?? null,
            ];
        }
        
        fclose($handle);

        foreach ($students as $stud)
        {
            $student = new StudentModel();
            $student->name = $stud['name'];
            $student->gender = $stud['gender'];
            $student->sclass_id = $stud['sclass_id'];
            $student->save();

        }
    }
}
