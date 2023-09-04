<?php

namespace Database\Seeders;

use App\Models\Contributor;
use Illuminate\Database\Seeder;

class ContributorsSeeder extends Seeder
{
    public function run(): void
    {
        $contributors = [
            [
                'id' => 1,
                'name' => 'mustafamax',
                'thumbnail' => '/assets/images/mustafamax.png',
                'phone' => '+96407707309366',
                'path_profile' => 'https://www.facebook.com/mustafamax13',
                'title' => 'مطور مواقع وتطبيقات باستخدام FLUTTER و LARAVEL',
                'desc' => 'مطور تطبيقات android و ios باستخدام flutter وايضا مطور مواقع الكترونية بإستخدام laravel. لقد قمت بإنشاء هذا الموقع لتقصير الوقت الذي يقضيه المبرمجون في إنشاء ملفات اللغة وترجمة هذه الملفات. كل هذا اصبح من الماضي الآن. مع موقع langfiles لا داعي للقلق قم بنسخ النصوص المتوفرة لكل المجالات وبكل الامتدادات والصقها في مشروعك.',
                'path_1' => 'https://www.youtube.com/channel/UCLhPq6dfOYemkP_hmohPLug',
                'path_2' => 'https://www.instagram.com/mustafa_3_max/',
                'path_3' => 'https://www.tiktok.com/@mustafa__max',
                'enabled' => true,
                'website' => 'https://mustafamax.com',
            ],
        ];

        foreach ($contributors as $contributor) {
            Contributor::create([
                'id' => $contributor['id'],
                'name' => $contributor['name'],
                'thumbnail' => $contributor['thumbnail'],
                'phone' => $contributor['phone'],
                'path_profile' => $contributor['path_profile'],
                'title' => $contributor['title'],
                'desc' => $contributor['desc'],
                'path_1' => $contributor['path_1'],
                'path_2' => $contributor['path_2'],
                'path_3' => $contributor['path_3'],
                'enabled' => $contributor['enabled'],
                'website' => $contributor['website'],
            ]);
        }
    }
}
