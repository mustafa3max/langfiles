<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SyntaxController extends Controller
{
    public $types;

    function createListSyntaxCache()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);

        $tables = Table::get('table');
        foreach ($tables as $table) {
            $this->types($table->table);
        }

        return $this->data();
    }

    function types($table)
    {
        $types = DB::table($table)->get(['key', 'value']);

        foreach ($types as $type) {
            foreach ($type as $keyValue) {
                $value = strtolower($keyValue);
                $value = str_replace('إ', 'ا', $value);
                $value = str_replace('أ', 'ا', $value);
                $value = str_replace('_', ' ', $value);
                $this->types[] = $value;
            }
        }
    }

    function data()
    {
        Cache::delete('syntaxes');
        $types = $this->types;

        $types =  array_unique($types);
        $types = array_values($types);

        Cache::put('syntaxes', $types);
        return response()->json(
            [
                'count' => count($types),
                'data' => $types
            ]
        );
    }
}
