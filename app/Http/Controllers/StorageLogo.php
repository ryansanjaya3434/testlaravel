<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageLogo extends Controller
{
    public function GetImage($filename)

    {
        $path = storage_path('../storage/app/company/'. $filename);
    
        if (!File::exists($path)) {
            abort(404);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
    
        $response->header("Content-Type", $type);
    
        return $response;
    
    }	
}
