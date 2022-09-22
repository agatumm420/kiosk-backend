<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShopController extends Controller
{
    public function show(Request $request, $page){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/pl/api/shop?page='.$page);
        return $response;
    }
    public function shop_slug(Request $request , $slug){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl//pl/api/shop/'.$slug.'?');
        return $response;
    }
    public function gastronomy(Request $request){
         $response=Http::get('https://galaxyapp.galaxy-centrum.pl//pl/api/gastronomy?');
         return $response;
    }
    public function gastronomy_slug(Request $request, $slug){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl//pl/api/gastronomy/'.$slug.'?');
        return $response;
    }
    public function service(Request $request){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl//pl/api/service?');
         return $response;
    }
    public function service_slug(Request $request, $slug){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl//pl/api/service/'.$slug.'?');
        return $response;
    }
    public function plan(Request $request , $kiosk){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl//pl/api/plan');
        return $response;
    }
}
