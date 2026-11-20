<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $teacherIds = Teacher::query()->pluck('id');

        if ($teacherIds->isEmpty()) {
            $this->call(TeacherSeeder::class);
            $teacherIds = Teacher::query()->pluck('id');
        }

        Subject::factory()
            ->count(5)
            ->state(fn () => [
                'teacher_id' => $teacherIds->random(),
            ])
            ->create();
    }
}