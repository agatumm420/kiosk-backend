<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Display;
use Illuminate\Support\Facades\Mail;
use App\Mail\PrinterErrorr;

class ErrorController extends Controller
{
    public function printer_error(Request $request, $channel){
        $req=$request->input('data');
        $display=Display::where('channel', $channel)->first();
        if($req['status']=='disabled'){
            $display->print=0;

        }
        if($req['status']=='out'){
            $display->print=1;
        }
        Mail::to('agnieszka@sofine.pl')->send(new PrinterError($display));
    }
}
