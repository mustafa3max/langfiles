<?php

namespace Database\Seeders;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public $articles = [
        [
            'path' => 'localization_or_arabization_of_a_website_using_laravel_and_langfiles.md',
            'title' => 'توطين او تعريب موقع الكتروني بإستخدام laravel و langfiles',
            'desc' => 'هل عندك موقع الكتروني قمت بانشائه بإستخدام laravel؟ في هذه المقالة ستعلمك كيفية توطين او تعريب موقعك الألكتروني بسهولة بإستخدام ادوات موقع langfiles.',
            'thumbnail' => 'storage/blog/images/adding_multiple_languages_to_the_website_using_laravel.png',
        ],
    ];

    public function run(): void
    {
        for ($i = 0; $i < count($this->articles); $i++) {
            Blog::create([
                'path' => $this->articles[$i]['path'],
                'title' => $this->articles[$i]['title'],
                'desc' => $this->articles[$i]['desc'],
                'thumbnail' => $this->articles[$i]['thumbnail'],
                'author' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
