<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{

    function table()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);

        foreach ($tables as $table) {
            try {
                Table::create(['name' => $table]);
            } catch (\Throwable $th) {
            }
        }

        return response()->json([
            'tables' => Table::get()
        ]);
    }
}
