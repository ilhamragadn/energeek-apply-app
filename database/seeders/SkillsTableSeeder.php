<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'name' => 'PHP'
        ]);
        Skill::create([
            'name' => 'PostgreSQL'
        ]);
        Skill::create([
            'name' => 'API (JSON, REST)'
        ]);
        Skill::create([
            'name' => 'Version Control System (Gitlab, Github)'
        ]);
    }
}
