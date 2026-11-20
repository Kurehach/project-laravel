<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classroomIds = Classroom::query()->pluck('id');

        if ($classroomIds->isEmpty()) {
            $this->call(ClassroomSeeder::class);
            $classroomIds = Classroom::query()->pluck('id');
        }

        Student::factory()
            ->count(20)
            ->state(fn () => [
                'classroom_id' => $classroomIds->random(),
            ])
            ->create();
    }
}