<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintFile;

class PrintFileController extends Controller
{
    public function stop_print(PrintFile $file){
        $file->printed=true;
        $file->save();
        return response()->json([
            'id'=>$file->id,
            'printed'=>$file->printed,
        ]);
    }
}
