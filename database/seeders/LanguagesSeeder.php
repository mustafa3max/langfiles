<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Type;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            'arabic',
            'english',
        ];
        $types = Type::get('id');
        foreach ($types as $type) {
            foreach ($languages as $lang) {
                Language::create([
                    'id_type' => $type->id,
                    'language' => $lang,
                    'enabled' => true
                ]);
            }
        }
    }
}
