<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['name' => '10 PPLG 1', 'major' => 'PPLG'],
            ['name' => '10 PPLG 2', 'major' => 'PPLG'],
            ['name' => '11 PPLG 1', 'major' => 'PPLG'],
            ['name' => '11 PPLG 2', 'major' => 'PPLG'],
            ['name' => '12 PPLG 1', 'major' => 'PPLG'],
            ['name' => '11 DKV 1', 'major' => 'DKV'],
            ['name' => '11 ANIMASI 1', 'major' => 'ANIMASI'],
        ];

        foreach ($classes as $class) {
            Classroom::firstOrCreate(
                ['name' => $class['name']],
                ['major' => $class['major']]
            );
        }
    }
}