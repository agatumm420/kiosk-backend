<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
class Shop{
    public $id;
    public $name;
    public $src;
    public $slug;
    public $box;
    public $wayfinder_id;
    public $categoryId;
    public function __constructor($id, $src, $name, $slug, $box, $wayfinder_id, $categoryId){
        $this->id=$id;
        $this->name=$name;
        $this->src=$src;
        $this->slug=$slug;
        $this->box=$box;
        $this->wayfinder_id=$wayfinder_id;
        $this->$categoryId=$categoryId;

    }
}
class Category{

    public $id;
    public $name;

    public function __constructor($id,  $name ){
        $this->id=$id;
        $this->name=$name;


    }
}
class ShopSlug{

    public $name;
    public $desc;
    public $contact;
    public $src;

    public $box_id;
    public $logo;
    public $wayfinder_id;
    public $location;
    public function __constructor( $src, $name, $desc, $contact, $box_id,$logo, $wayfinder_id, $location){

        $this->name=$name;
        $this->desc=$desc;
        $this->contact=$contact;
        $this->src=$src;
        $this->logo=$logo;
        $this->box_id=$box_id;
        $this->wayfinder_id=$wayfinder_id;
        $this->location=$location;

    }
}
class Promotion{
        public $id;
        public $name;
        public $src;
        public function __constructor($id,  $name, $src ){
            $this->id=$id;
            $this->name=$name;
            $this->src=$src;

        }

}
class Comfort{
    public $id;
    public $key;
    public $name;
    public $wayfinder_id;
    public function __constructor($id, $key ,$name, $wayfinder_id ){
        $this->id=$id;
        $this->key=$key;
        $this->name=$name;
        $this->wayfinder_id=$wayfinder_id;

    }

}
class ShopController extends Controller
{
    public function show(Request $request, $page){
        //dd('i made it  here');
        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('GET', 'https://galaxyapp.galaxy-centrum.pl/api/shop?page=1');
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/shop?page='.$page);
        $data=$response['data'];
        $categories=$data['categories'];
        $categories_mapped=array_map(function($obj){
            $category=new Category;

            $category->id=$obj['id'];

            $category->name=$obj['name'];

            return $category;
        }, $categories);
        //dd();
        $shops=$data['shops'];

        $shops_mapped=array_map(function($obj){
            $shop=new Shop($obj['id'], $obj['src'], $obj['name'], $obj['slug'], $obj['box'], $obj['wayfinder_id'], $obj['categoryId']);
            $shop->id=$obj['id'];
            $shop->src=$obj['src'];
            $shop->name= $obj['name'];
            $shop->slug=$obj['slug'];
            $shop->box=$obj['box'];
            $shop->wayfinder_id=$obj['wayfinder_id'];
            $shop->categoryId= $obj['categoryId'];

            return $shop;
        }, $shops);
    //    $shops_keys=array_keys($shops_mapped);
    //    function array_fill_keys_good($keyArray, $valueArray) {
    //     if(is_array($keyArray)) {
    //         foreach($keyArray as $key => $value) {
    //             $filledArray[$value] = $valueArray[$key];
    //         }
    //     }
    //     return $filledArray;
    //     }
    //    $new_shop_key= array_map(function($obj){
    //      return strval($obj);
    //    },$shops_keys);
    //    $ready_shops=array_fill_keys_good($new_shop_key, $shops_mapped);

    //    $category_keys=array_keys($categories_mapped);
    //    $new_category_key= array_map(function($obj){
    //     return strval($obj);
    //   },$category_keys);
    //   $ready_categories=array_fill_keys_good($new_category_key, $category_keys);



        return response()->json([
            'data'=>[
                 'categories'=> $categories_mapped,
                 "shops"=>$shops_mapped,
            ]
        ]);

    }
    public function shop(Request $request){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/shop');
        $data=$response['data'];
        $categories=$data['categories'];
        $categories_mapped=array_map(function($obj){
            $category=new Category($obj['id'], $obj['name']);
            $category->id=$obj['id'];
            $category->name=$obj['name'];
            return $category;
        }, $categories);
        $shops=$data['shops'];
        $shops_mapped=array_map(function($obj){
            $shop=new Shop($obj['id'], $obj['src'], $obj['name'], $obj['slug'], $obj['box'], $obj['wayfinder_id'], $obj['categoryId']);
            $shop->id=$obj['id'];
            $shop->src=$obj['src'];
            $shop->name= $obj['name'];
            $shop->slug=$obj['slug'];
            $shop->box=$obj['box'];
            $shop->wayfinder_id=$obj['wayfinder_id'];
            $shop->categoryId= $obj['categoryId'];
            return $shop;
        }, $shops);

        return response()->json([
            'data'=>[
                "categories"=> $categories_mapped,
                "shops"=>$shops_mapped
            ]
        ]);
    }
    public function shop_slug(Request $request , $slug){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/shop/'.$slug);
        $data=$response['data'];
        $promotions=$data['promotions'];
        $promotions_mapped=array_map(function($obj){
            $promo=new Promotion($obj['id'], $obj['name'], $obj['src']);
            $promo->id=$obj['id'];
            $promo->name=$obj['name'];
            $promo->src=$obj['src'];
            return $promo;
        }, $promotions);





            return response()->json([
                'data'=>[
                        "name"=> $data['name'],
                        "desc"=> $data['desc'],
                        "contact"=> $data['contact'],
                         "src"=>$data['src'],
                        "logo"=> $data['logo'],
                        "box_id"=> $data['box_id'],
                        "wayfinder_id"=> $data['wayfinder_id'],
                        "localization"=> $data['localization'],
                        "promotions"=>$promotions_mapped,
                ]
            ]);
    }
    public function gastronomy(Request $request){
         $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/gastronomy');
         $data=$response['data'];
         $categories=$data['categories'];
         $categories_mapped=array_map(function($obj){
             $category=new Category($obj['id'], $obj['name']);
             $category->id=$obj['id'];
             $category->name=$obj['name'];
             //dd($category);
             return $category;
         }, $categories);
         $shops=$data['shops'];
         $shops_mapped=array_map(function($obj){
             $shop=new Shop($obj['id'], $obj['src'], $obj['name'], $obj['slug'], $obj['box'], $obj['wayfinder_id'], $obj['categoryId']);
             $shop->id=$obj['id'];
             $shop->src=$obj['src'];
             $shop->name= $obj['name'];
             $shop->slug=$obj['slug'];
             $shop->box=$obj['box'];
             $shop->wayfinder_id=$obj['wayfinder_id'];
             $shop->categoryId= $obj['categoryId'];
             return $shop;
         }, $shops);

         return response()->json([
             'data'=>[
                 "categories"=> $categories_mapped,
                 "shops"=>$shops_mapped
             ]
         ]);
    }
    public function gastronomy_slug(Request $request, $slug){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/gastronomy/'.$slug);
        $data=$response['data'];
        $promotions=$data['promotions'];
        $promotions_mapped=array_map(function($obj){
            $promo=new Promotion($obj['id'], $obj['name'], $obj['src']);
            $promo->id=$obj['id'];
            $promo->name=$obj['name'];
            $promo->src=$obj['src'];
            return $promo;
        }, $promotions);





            return response()->json([
                'data'=>[
                        "name"=> $data['name'],
                        "desc"=> $data['desc'],
                        "contact"=> $data['contact'],
                         "src"=>$data['src'],
                        "logo"=> $data['logo'],
                        "box_id"=> $data['box_id'],
                        "wayfinder_id"=> $data['wayfinder_id'],
                        "localization"=> $data['localization'],
                        "promotions"=>$promotions_mapped,
                ]
            ]);
    }
    public function service(Request $request){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/service');
        $data=$response['data'];
        $categories=$data['categories'];
        $categories_mapped=array_map(function($obj){
            $category=new Category($obj['id'], $obj['name']);
            $category->id=$obj['id'];
            $category->name=$obj['name'];
            return $category;
        }, $categories);
        $shops=$data['shops'];
        $shops_mapped=array_map(function($obj){
            $shop=new Shop($obj['id'], $obj['src'], $obj['name'], $obj['slug'], $obj['box'], $obj['wayfinder_id'], $obj['categoryId']);
            $shop->id=$obj['id'];
            $shop->src=$obj['src'];
            $shop->name= $obj['name'];
            $shop->slug=$obj['slug'];
            $shop->box=$obj['box'];
            $shop->wayfinder_id=$obj['wayfinder_id'];
            $shop->categoryId= $obj['categoryId'];
            return $shop;
        }, $shops);

        return response()->json([
            'data'=>[
                "categories"=> $categories_mapped,
                "shops"=>$shops_mapped
            ]
        ]);
    }
    public function service_slug(Request $request, $slug){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/service/'.$slug);
        $data=$response['data'];
        $promotions=$data['promotions'];
        $promotions_mapped=array_map(function($obj){
            $promo=new Promotion($obj['id'], $obj['name'], $obj['src']);
            $promo->id=$obj['id'];
            $promo->name=$obj['name'];
            $promo->src=$obj['src'];
            return $promo;
        }, $promotions);





            return response()->json([
                'data'=>[
                        "name"=> $data['name'],
                        "desc"=> $data['desc'],
                        "contact"=> $data['contact'],
                         "src"=>$data['src'],
                        "logo"=> $data['logo'],
                        "box_id"=> $data['box_id'],
                        "wayfinder_id"=> $data['wayfinder_id'],
                        "localization"=> $data['localization'],
                        "promotions"=>$promotions_mapped,
                ]
            ]);
    }
    public function plan(Request $request , $kiosk){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/plan');
        $data=$response['data'];
        $level_minus=$data[0];
        //comfort for each level
        $level_minus_comfort;
        $level_minus_comfort_mapped;
        $level_minus_categories;
        $level_minus_categories_mapped;
        $level_minus_shops;
        $level_minus_shops_mapped;

        $level_zero_comfort;
        $level_zero_comfort_mapped;
        $level_zero_categories;
        $level_zero_categories_mapped;
        $level_zero_shops;
        $level_zero_shops_mapped;

        $level_one_comfort;
        $level_one_comfort_mapped;
        $level_one_categories;
        $level_one_categories_mapped;
        $level_one_shops;
        $level_one_shops_mapped;

        $level_two_comfort;
        $level_two_comfort_mapped;
        $level_two_categories;
        $level_two_categories_mapped;
        $level_two_shops;
        $level_two_shops_mapped;


        foreach($data as $level){

            $level_comfort=$level['comfort'];
             $level_comfort_mapped=array_map(function($obj){
                    $comfort=new Comfort($obj['id'], $obj['key'] ,$obj['name'], $obj['wayfinder_id'] );
                    $comfort->id=$obj['id'];
                    $comfort->key=$obj['key'];
                    $comfort->name=$obj['name'];
                    $comfort->wayfinder_id=$obj['wayfinder_id'];
                    return $comfort;
            }, $level_comfort);
             $level_categories=$level['categories'];
            $level_categories_mapped=array_map(function($obj){
                    $category=new Category($obj['id'], $obj['name']);
                    $category->id=$obj['id'];
                    $category->name=$obj['name'];
                    return $category;
                }, $level_categories);
            $level_shops=$level['shops'];
            $level_shops_mapped=array_map(function($obj){
                    $shop=new Shop($obj['id'], $obj['src'], $obj['name'], $obj['slug'], $obj['box'], $obj['wayfinder_id'], $obj['categoryId']);
                    $shop->id=$obj['id'];
                    $shop->src=$obj['src'];
                    $shop->name= $obj['name'];
                    $shop->slug=$obj['slug'];
                    $shop->box=$obj['box'];
                    $shop->wayfinder_id=$obj['wayfinder_id'];
                    $shop->categoryId= $obj['categoryId'];
                    return $shop;
            }, $level_shops);
            switch ($level['level']) {
                case -1:
                    $level_minus_comfort=$level_comfort;
                    $level_minus_comfort_mapped=$level_comfort_mapped;
                    $level_minus_categories=$level_categories;
                    $level_minus_categories_mapped=$level_categories_mapped;
                    $level_minus_shops=$level_shops;
                    $level_minus_shops_mapped=$level_shops_mapped;
                    break;
                case 0:
                    $level_zero_comfort=$level_comfort;
                    $level_zero_comfort_mapped=$level_comfort_mapped;
                    $level_zero_categories=$level_categories;
                    $level_zero_categories_mapped=$level_categories_mapped;
                    $level_zero_shops=$level_shops;
                    $level_zero_shops_mapped=$level_shops_mapped;
                    break;
                case 1:
                    $level_one_comfort=$level_comfort;
                    $level_one_comfort_mapped=$level_comfort_mapped;
                    $level_one_categories=$level_categories;
                    $level_one_categories_mapped=$level_categories_mapped;
                    $level_one_shops=$level_shops;
                    $level_one_shops_mapped=$level_shops_mapped;
                    break;
                case 2:
                    $level_two_comfort=$level_comfort;
                    $level_two_comfort_mapped=$level_comfort_mapped;
                    $level_two_categories=$level_categories;
                    $level_two_categories_mapped=$level_categories_mapped;
                    $level_two_shops=$level_shops;
                    $level_two_shops_mapped=$level_shops_mapped;
                    break;
            }
        }



        return response()->json([
            'data'=>[
            [
                "level"=> -1,
                "comfort"=>$level_minus_comfort_mapped ,
             "categories"=> $level_minus_categories_mapped,
                "shops"=> $level_minus_shops_mapped,
            ],
            [
                "level"=> 0,
                   "categories"=> $level_zero_categories_mapped,
                   "comfort"=> $level_zero_comfort_mapped,
                "shops"=>$level_zero_shops_mapped,
            ],
           [
                "level"=> 1,
                   "categories"=> $level_one_categories_mapped,
                   "comfort"=>$level_one_comfort_mapped,
                "shops"=>$level_one_shops_mapped,
                ],
            [
                "level"=>2,
                "categories"=>$level_two_categories_mapped,
                   "comfort"=>$level_two_comfort_mapped,
                "shops"=>$level_two_shop_mapped
            ]
        ]]);
    }
    public function promotion(Request $request){
        $response=Http::get('https://galaxyapp.galaxy-centrum.pl/api/promotion');
        $data=$response['data'];
        $promotions=$data;
        $promotions_mapped=array_map(function($obj){
            $promo=new Promotion($obj['id'], $obj['name'], $obj['src']);
            $promo->id=$obj['id'];
            $promo->name=$obj['name'];
            $promo->src=$obj['src'];
            return $promo;
        }, $promotions);
        return response()->json([
            'data'=>$promotions_mapped
        ]);
    }
}
