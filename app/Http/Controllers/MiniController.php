<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mini;

class MiniController extends Controller
{
    public function add_clicks(Mini $mini){
        $mini->clicks_today+=1;
        $mini->clicks_week+=1;
        $mini->clicks_total+=1;
        $mini->save();
        return response()->json([
            'data'=>[
                'success'=>true
            ]

        ]);
    }
}
