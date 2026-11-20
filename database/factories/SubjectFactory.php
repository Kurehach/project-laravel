<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subject>
 */
class SubjectFactory extends Factory
{
    public function definition(): array
    {
        $subjects = [
            ['name' => 'Pemrograman Web', 'code' => 'MPW'],
            ['name' => 'Pemrograman Perangkat Bergerak', 'code' => 'PPB'],
            ['name' => 'Pemrograman Gim', 'code' => 'PGM'],
            ['name' => 'Basis Data', 'code' => 'BDT'],
            ['name' => 'Produk Kreatif dan Kewirausahaan', 'code' => 'PKK'],
        ];

        $selected = fake()->unique()->randomElement($subjects);
        $existingTeacherId = Teacher::query()->inRandomOrder()->value('id');

        return [
            'name' => $selected['name'],
            'code' => $selected['code'] . '-' . fake()->unique()->numberBetween(10, 99),
            'teacher_id' => $existingTeacherId ?? Teacher::factory(),
        ];
    }
}