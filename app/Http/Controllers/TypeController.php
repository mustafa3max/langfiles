<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    function types()
    {
        return File::where('enabled', true)->select('type')->groupby('type')->paginate(50, ['type']);
    }

    function languages(Request $request)
    {
        return File::where('type', $request->type)->paginate(50, ['language']);
    }

    function files(Request $request)
    {
        return File::where('type', $request->type)->where('language', $request->language)->paginate(50, ['path']);
    }

    function file(Request $request)
    {
        $file = Storage::disk($this->diskTypes)->get($request->path);
        return response()->json([
            'file' => $file
        ]);
    }
}
