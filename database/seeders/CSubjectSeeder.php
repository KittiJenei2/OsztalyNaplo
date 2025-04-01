<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CSubjectModel;

class CsubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes_subjects = array();

        $handle = fopen(public_path('classes_subjects.txt'), 'r');

        while (($line = fgets($handle)) !== false)
        {
            $data = explode(';',trim($line));

            $classes_subjects[] = [
                'sclass_id' => $data[0] ?? null,
                'subject_id' => $data[1] ?? null,
            ];
        }
        
        fclose($handle);

        foreach ($classes_subjects as $cs)
        {
            $csub = new CSubjectModel();
            $csub->sclass_id = $cs['sclass_id'];
            $csub->subject_id = $cs['subject_id'];
            $csub->save();

        }
    }
}
