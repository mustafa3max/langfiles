<?php

namespace App\Http\Controllers;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{

    function createTables()
    {
        $tables = Storage::disk(Globals::diskTypes())->allFiles();
        $d = [];

        foreach ($tables as $table) {
            $tableNew = str_replace('.json', '', $table);
            $lang = explode('_', $tableNew);

            if (in_array($lang[0], Globals::languages())) {
                $json = Storage::disk(Globals::diskTypes())->get($table);

                try {
                    $json = json_decode($json, true);
                } catch (\Throwable $th) {
                }

                $number = count($json);
                $name = array_slice($lang, 1, count($lang));
                $name_en = implode(' ', $name);

                $name_ar = __('tables.' . implode('_', $name));

                try {
                    Table::updateOrCreate(
                        ['table' => $tableNew],
                        [
                            'name_en' => $name_en,
                            'name_ar' => $name_ar,
                            'lang' => $lang[0],
                            'table' => $tableNew,
                            'file' => $table,
                            'number' => $number
                        ]
                    );
                } catch (\Throwable $th) {
                }
            }
        }

        return response()->json([
            'tables' => Table::get()
        ]);
    }

    function createFiles()
    {
        $files = Table::get();
        $da = [];
        foreach ($files as $file) {

            $json = Storage::disk(Globals::diskTypes())->get($file->file);


            $json = json_decode($json);
            $da[] = $file;

            // $table = str_replace('.json', '', $file);
            // $file = explode('_', $table);
            // $lang = $file[0];
            // $file = array_slice($file, 1, count($file));
            // $file = implode(' ', $file);

            // foreach ($allJson ?? [] as $key => $value) {
            //     if (is_array($value)) {
            //         $sections = json_encode($value);
            //     }

            //     if (!is_array($value)) {
            //         if (strlen($key) > 0 && strlen($value) > 0) {
            //             DB::table($table)->updateOrInsert(
            //                 ['key' => $key],
            //                 [
            //                     'type' => $file,
            //                     'language' => $lang,
            //                     'key' => $key,
            //                     'value' => $value,
            //                     'enabled' => true,
            //                     'sections' => $sections
            //                 ]
            //             );
            //         }
            //     }
            // }
        }
        return $da;
        return 'OK';
    }

    function tablesName(Request $request)
    {
        if (in_array($request->lang, Globals::languages())) {
            $tables = Table::where('lang', $request->lang)->get('table')->toArray();
            $tables = array_map('current', $tables);

            $names = Table::where('lang', $request->lang)->get('name_' . $request->lang)->toArray();
            $names = array_map('current', $names);

            $tables = array_combine($tables, $names);

            return $tables;
        }
        return 'Error Langouge';
    }

    function createFullTableType(Request $request)
    {
        $nameLang = ['en_' . $request->table_name, 'ar_' . $request->table_name];

        // Step 1
        // Start Create Table Database
        $pathTableMigrations = database_path('migrations') . "/template.php";

        $data = file_get_contents($pathTableMigrations);

        for ($i = 0; $i < count($nameLang); $i++) {
            $dataNew = str_replace('---name---table---', $nameLang[$i], $data);
            file_put_contents(database_path('migrations/') . $nameLang[$i] . '.php', $dataNew);
        }
        // End Create Table Database

        // Step 2
        // Start Create File Jsom
        $data = Storage::disk('types')->get('template.json');

        for ($i = 0; $i < count($nameLang); $i++) {
            $dataNew = str_replace('---name---table---', $nameLang[$i], $data);
            Storage::disk('types')->put($nameLang[$i] . '.json', $dataNew);
        }
        // End Create File Jsom

        // Step 3
        // Start Create Transalte Table
        for ($i = 0; $i < count($request->tables_translate); $i++) {
            $langPath = lang_path(array_keys($request->tables_translate)[$i] . '/tables.php');
            $data = file_get_contents($langPath);

            $dataNew = str_replace('---key---', $request->table_name, $data);

            $dataNew = str_replace('---value---', array_values($request->tables_translate)[$i] . "',\n    '---key---' => '---value---", $dataNew);

            file_put_contents($langPath, $dataNew);
        }
        // End Create Transalte Table

        Artisan::call('migrate');

        return $this->createTables();
    }
}
