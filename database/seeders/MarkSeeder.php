<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MarkModel;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marks = array();

        $handle = fopen(public_path('marks.txt'), 'r');

        while (($line = fgets($handle)) !== false)
        {
            $data = explode(';',trim($line));

            $marks[] = [
                'subject_id' => $data[0] ?? null,
                'student_id' => $data[1] ?? null,
                'mark' => $data[2] ?? null,
            ];
        }
        
        fclose($handle);

        foreach ($marks as $m)
        {
            $mark = new MarkModel();
            $mark->subject_id = $m['subject_id'];
            $mark->student_id = $m['student_id'];
            $mark->mark = $m['mark'];
            $mark->save();

        }
    }
}
