<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $classroomIds = Classroom::query()->pluck('id');

        if ($classroomIds->isEmpty()) {
            $this->call(ClassroomSeeder::class);
            $classroomIds = Classroom::query()->pluck('id');
        }

        Teacher::factory()
            ->count(8)
            ->state(fn () => [
                'classroom_id' => $classroomIds->random(),
            ])
            ->create();
    }
}