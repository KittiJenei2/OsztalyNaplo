<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubjectModel;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = array();

        $handle = fopen(public_path('subjects.txt'), 'r');

        while (($line = fgets($handle)) !== false)
        {
            $data = explode(';',trim($line));

            $subjects[] = [
                'name' => $data[0] ?? null,
            ];
        }
        
        fclose($handle);

        foreach ($subjects as $sub)
        {
            $subject = new SubjectModel();
            $subject->name = $sub['name'];
            $subject->save();

        }
    }
}
