<?php

namespace App\Http\Controllers;

use App\Http\Globals;
use App\Models\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public $langs = ['ar', 'en'];

    function createTables()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);
        foreach ($tables as $table) {
            $lang = explode('_', $table);

            if (in_array($lang[0], $this->langs)) {
                $name = array_slice($lang, 1, count($lang));
                $name = implode(' ', $name);
                try {
                    Table::create(['name' => $name, 'lang' => $lang[0], 'table' => $table]);
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
}
