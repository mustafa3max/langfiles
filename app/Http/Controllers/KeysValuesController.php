<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class KeysValuesController extends Controller
{
    public function getAll(Request $request)
    {

        $data = Cache::get('data-keys-values');

        $newData = [];
        foreach ($request->all_key as $key) {
            try {
                if (in_array($key, array_keys($data[$request->lang]))) {
                    $newData[$key] = $data[$request->lang][$key];
                } else {
                    $newData[$key] = $key;
                }
            } catch (\Throwable $th) {
                $newData = $request->all_key;
            }
        }
        return $newData;
    }
}
