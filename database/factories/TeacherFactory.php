<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Teacher>
 */
class TeacherFactory extends Factory
{
    public function definition(): array
    {
        $existingClassroomId = Classroom::query()->inRandomOrder()->value('id');

        return [
            'name' => fake()->name(),
            'nip' => (string) fake()->unique()->randomNumber(8, true),
            'classroom_id' => $existingClassroomId ?? Classroom::factory(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}