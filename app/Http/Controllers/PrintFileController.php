<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintFile;

class PrintFileController extends Controller
{
    public function stop_print(PrintFile $print_file){
        $print_file->printed=true;
        $print_file->save();
        return response()->json([
            'id'=>$file->id,
            'printed'=>$file->printed,
        ]);
        // dd([
        //     'id'=>$print_file->id,
        //     'printed'=>$print_file->printed,
        // ]);
    }
}
