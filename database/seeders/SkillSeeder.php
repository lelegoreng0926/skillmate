<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $programming = DB::table('skill_categories')->insertGetId([
            'name' => 'Programming',
            'icon' => 'fas fa-code',
            'description' => 'Skill pemrograman web, mobile, dan desktop.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $design = DB::table('skill_categories')->insertGetId([
            'name' => 'Design',
            'icon' => 'fas fa-palette',
            'description' => 'Skill desain UI/UX dan grafis.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $language = DB::table('skill_categories')->insertGetId([
            'name' => 'Language',
            'icon' => 'fas fa-language',
            'description' => 'Skill bahasa dan komunikasi.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('skills')->insert([
            [
                'name' => 'Laravel',
                'category_id' => $programming,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PHP',
                'category_id' => $programming,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'JavaScript',
                'category_id' => $programming,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Python',
                'category_id' => $programming,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Java',
                'category_id' => $programming,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Flutter',
                'category_id' => $programming,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'UI/UX Design',
                'category_id' => $design,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Figma',
                'category_id' => $design,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Photoshop',
                'category_id' => $design,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'English',
                'category_id' => $language,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}