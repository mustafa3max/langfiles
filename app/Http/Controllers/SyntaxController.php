<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Globals;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Storage;

class SyntaxController extends Controller
{
    public $types = [];

    function createListSyntaxCache()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);

        $tables = Table::get('file');

        foreach ($tables as $table) {
            $lang = explode('_', $table->file)[0];

            $this->types($table->file, $lang);
        }
        $types = [];
        foreach (Globals::languages() as $lang) {
            $types[$lang] = [];
            foreach ($this->types[$lang] as $value) {
                $types[$lang] = array_merge($types[$lang], (array)$value);
            }
        }
        $this->types = $types;

        return $this->data();
    }

    function types($table, $lang)
    {
        $this->types[$lang][] = json_decode(Storage::disk(Globals::diskTypes())->get($table));
    }

    function data()
    {
        Cache::delete('syntaxes');
        Cache::put('syntaxes', $this->types);

        return response()->json($this->types);
    }
}
