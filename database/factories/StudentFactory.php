<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingClassroomId = Classroom::query()->inRandomOrder()->value('id');

        return [
            'name' => fake()->name(),
            'nis' => (string) fake()->unique()->randomNumber(6, true),
            'classroom_id' => $existingClassroomId ?? Classroom::factory(),
            'address' => fake()->address(),
        ];
    }
}