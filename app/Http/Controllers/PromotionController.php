<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
class PromotionController extends Controller
{
    //
    public function add_clicks(Promotion $promotion){
        $promotion->clicks_today+=1;
        $promotion->clicks_week+=1;
        $promotion->clicks_total+=1;
        $promotion->save();
        return response()->json([
            'data'=>[
                'success'=>true
            ]

        ]);
    }
}
