<?php

namespace App\Http\Controllers;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{

    function createTables()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);
        foreach ($tables as $table) {
            $lang = explode('_', $table);

            if (in_array($lang[0], Globals::languages())) {
                $name = array_slice($lang, 1, count($lang));
                $name_en = implode(' ', $name);
                $name_ar = __('tables.' . implode('_', $name));
                try {
                    Table::create(['name_en' => $name_en, 'name_ar' => $name_ar, 'lang' => $lang[0], 'table' => $table]);
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
        $files = Storage::disk(Globals::diskTypes())->allFiles();
        foreach ($files as $file) {
            $json = Storage::disk(Globals::diskTypes())->get($file);
            $allJson = json_decode($json);
            $table = str_replace('.json', '', $file);
            $file = explode('_', $table);
            $lang = $file[0];
            $file = array_slice($file, 1, count($file));
            $file = implode(' ', $file);

            foreach ($allJson as $key => $value) {
                try {
                    DB::table($table)->insert([
                        'type' => $file,
                        'language' => $lang,
                        'key' => $key,
                        'value' => $value,
                        'enabled' => true,
                    ]);
                } catch (\Throwable $th) {
                }
            }
        }
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
}
