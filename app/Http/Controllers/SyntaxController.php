<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SyntaxController extends Controller
{
    public $types;

    function createListSyntaxCache($type)
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);

        $tables = Table::get('table');
        foreach ($tables as $table) {
            $this->types($table->table, $type);
        }

        if ($type == 'syntaxes') {
            return $this->data();
        }
        if ($type == 'keys-values') {
            return $this->dataKeyValue();
        }
    }

    function types($table, $type)
    {
        $types = DB::table($table)->get(['key', 'value', 'language']);
        foreach ($types as $type) {
            if ($type == 'syntaxes') {
                foreach ($type as  $keyValue) {
                    $value = strtolower($keyValue);
                    $value = str_replace('إ', 'ا', $value);
                    $value = str_replace('أ', 'ا', $value);
                    $value = str_replace('_', ' ', $value);
                    $this->types[] =  $value;
                }
            } else {
                $this->types[$type->language][$type->key] = $type->value;
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

    function dataKeyValue()
    {
        Cache::delete('data-keys-values');
        $types = $this->types;

        Cache::put('data-keys-values', $types);

        return response()->json(
            [
                'count' => count($types),
                'data' => $types
            ]
        );
    }
}
