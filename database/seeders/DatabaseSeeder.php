<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StudentModel;
use App\Models\SubjectModel;
use App\Models\SclassModel;
use App\Models\CSubjectModel;
use App\Models\MarkModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $this->call([
            SClassSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
            MarkSeeder::class,
            CSubjectSeeder::class,
        ]);
    }
}
