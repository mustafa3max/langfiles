<div id="bodyText">
    @component('components.editor.img', [
        'src' => asset('assets/blog/images/laravel_localization.jpg'),
        'alt' => 'اضافة لغات متعددة للموقع الالكتروني باستخدام لارافيل',
    ])
    @endcomponent
    اضافة لغات متعددة للموقع الالكتروني باستخدام لارافيل عملية في غاية الاهمية ولذلك في هذا الدرس سنتعلم كيفية
    ذلك
    وسيكون الشرح عبارة عن خطوات لنبدا الآن
    <br>
    اولا عليك فتح هذه الصفحة لانها مهمة وتحتوي على معلومات قيمة بخصوص ترجمة الموقع
    @component('components.editor.link', [
        'href' => 'https://laravel.com/docs/10.x/localization',
        'value' => 'laravel localization',
    ])
    @endcomponent
    <br>
    ثانيا اذا كنت
    اول مرة في هذا المشورع تتعامل مع تعدد اللغات فان مجلد lang غير موجود ولانشائه استخدم هذا الامر
    @component('components.editor.code', [
        'value' => 'php artisan lang:publish',
        'id' => 'code_1',
    ])
    @endcomponent
    ثالثا ادخل على موقع langfiles لنسخ ملفات ترجمة جاهزة لتوفر على نفسك كتابة الترجمة
    <br>
    رابعا استخدم الطريقة التالية
    لاضافة المحتوى النصي من ملفات الترجمة في ملفات blade.php او ملفات php
    @component('components.editor.code', [
        'value' => "__('messages.welcome')",
        'id' => 'code_2',
    ])
    @endcomponent
    لنفترض انك تستخدم لغة واحدة واحدة هل تحتاج ان تفعل مثل ما فعلنا في هذا الدرس نعم واوكد لك ان هذا مهم جدا فوق
    ما
    تتصور لعدة اسباب منها التدقيق اللغوي و اضافة لغات متعددة في المستقبل يكون عاية في السهولة فقط تقوم بنسخ
    الملف
    ولصقه
    في اي مترجم مناسب او اعطائه الى مترجم محترف يقوم بترجمته لك بملغ معين
    اما اذا كنت تستخدم اكثر من لغة فعليك في هذه الحالة تحويل موقعك الى موقع متعدد اللغات وسنستخدم هذه الاداة
    الرائعة
    @component('components.editor.link', [
        'href' => 'https://github.com/mcamara/laravel-localization',
        'value' => 'laravel-localization',
    ])
    @endcomponent
</div>
