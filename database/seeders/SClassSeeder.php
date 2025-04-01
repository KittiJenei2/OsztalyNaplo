<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SClassModel;

class SClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolclasses = array();

        $handle = fopen(public_path('schoolclasses.txt'), 'r');

        while (($line = fgets($handle)) !== false)
        {
            $data = explode(';',trim($line));

            $schoolclasses[] = [
                'name' => $data[0] ?? null,
                'year' => $data[1] ?? null,
            ];
        }
        
        fclose($handle);

        foreach ($schoolclasses as $sclass)
        {
            $schoolclass = new SClassModel();
            $schoolclass->name = $sclass['name'];
            $schoolclass->year = $sclass['year'];
            $schoolclass->save();

        }
    }
}
