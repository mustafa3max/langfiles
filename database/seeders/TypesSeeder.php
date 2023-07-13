<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            '2d_design_programs',
            '3d_design_programs',
            'animation_programs',
            'browsers',
            'buttons',
            'ide',
            'languages',
            'login',
            'page_names',
            'photo_editing_programs',
            'programming_languages',
            'register',
            'video_editing_programs',
        ];
        foreach ($types as $value) {
            Type::create([
                'type' => $value,
                'enabled' => true
            ]);
        }
    }
}
