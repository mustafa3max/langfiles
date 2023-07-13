<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function create(Request $request)
    {
        $files = Storage::disk($this->diskTypes)->allFiles();
        $paths = [];
        foreach ($files as $file) {
            $paths[] = explode('/', $file);
        }

        for ($i = 0; $i < count($files); $i++) {
            File::updateOrCreate(
                ['path' => $files[$i]],
                [
                    "type" => $paths[$i][0],
                    "language" => $paths[$i][1],
                    "file" => $paths[$i][2],
                    "path" => $files[$i],
                ],
            );
        }
        return response()->json([
            'files' => File::get(),
        ]);
    }
}
