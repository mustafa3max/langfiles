<?php

namespace Database\Seeders;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public $articles = [
        // [
        //     'path' => '.md',
        //     'title' => '',
        //     'desc' => '',
        //     'thumbnail' => 'storage/blog/images/.png',
        // ],
        [
            'path' => 'localization_flutter_applications_using_langfiles.md',
            'title' => 'اداة langtool المذهلة لتوطين تطبيقات flutter',
            'desc' => 'إن توطين او تعريب التطبيقات عملية مهمة إذا اردت ان يصل تطبيقك إلى العالمية لذلك وفرنا لكم اداة langtool لمساعدتك في انشاء تطبيقات flutter رائعة.',
            'thumbnail' => 'storage/blog/images/langtool_flutter_home.png',
        ],
        [
            'path' => 'localization_or_arabization_of_a_website_using_laravel_and_langfiles.md',
            'title' => 'توطين او تعريب موقع الكتروني بإستخدام laravel و langfiles',
            'desc' => 'هل عندك موقع الكتروني قمت بانشائه بإستخدام laravel؟ في هذه المقالة ستعلمك كيفية توطين او تعريب موقعك الألكتروني بسهولة بإستخدام ادوات موقع langfiles.',
            'thumbnail' => 'storage/blog/images/adding_multiple_languages_to_the_website_using_laravel.png',
        ],
        [
            'path' => 'creating_a_classified_ads_website_using_laravel_10_part_one.md',
            'title' => 'انشاء موقع الكتروني اعلانات مبوبة باستخدام laravel 10 الجزء الاول',
            'desc' => 'إن انشاء موقع الكتروني باستخدام laravel غاية في السهولة فقط اذا حصلت على مصادر تعلم تشرح لك كل صغيرة وكبيرة ومن هذا المنطلق اقدم لك هذا المقال الرائع.',
            'thumbnail' => 'storage/blog/images/creating_a_classified_ads_website_using_laravel_10_part_one.png',
        ],
        [
            'path' => 'localization_flutter_applications_using_langfiles.md',
            'title' => 'توطين أو تعريب تطبيقات flutter باستخدام langfiles',
            'desc' => 'إن توطين أو تعريب تطبيقات flutter مهم للغاية إذا كنت تريد وصول تطبيقك الى نطاق واسع من المستخدمين لذلك وفي هذا الدرس ساشرح لك كيفية ذلك تابع معي.',
            'thumbnail' => 'storage/blog/images/localization_flutter_applications_using_langfiles.png',
        ],
        [
            'path' => 'localization_of_games_created_by_godot.md',
            'title' => 'توطين او تعريب الالعاب التي تم إنشائها بواسطة godot',
            'desc' => 'في هذا الدرس سنتعلم كيفية توطين او تعريب لعبة أنشائها بواسطة محرك الألعاب godot الغني غن التعريف. الشرح سيكون عبارة عن خطوات بسيطة لكن قوية و فعالة.',
            'thumbnail' => 'storage/blog/images/localization_of_games_created_by_godot.png',
        ],
    ];

    public function run(): void
    {
        for ($i = 0; $i < count($this->articles); $i++) {
            Blog::updateOrinsert(
                ['id' => $i + 1],
                [
                    'path' => $this->articles[$i]['path'],
                    'title' => $this->articles[$i]['title'],
                    'desc' => $this->articles[$i]['desc'],
                    'thumbnail' => $this->articles[$i]['thumbnail'],
                    'author' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
