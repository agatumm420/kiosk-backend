<?php

namespace App\Http\Controllers;

use App\Events\PrintSend;
use App\Models\SlideShow;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Display;
use App\Models\PrintFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class DisplayController extends Controller
{
    public function get_slide_show(Display $display){
        // $user = auth('api')->user() ?? null;
      //    foreach($display->slide_show()->screen_savers() as $screen_s){
      //       $screen_s->image;
      //       response()->file($screen_s->image);
      //    }
          //$show=$display->slide_show();
         // dd($display->slide_show_id);
         $response_array=[];

         $show=SlideShow::find($display->slide_show_id);
         array_push($response_array, response()->json([
              'data' => [
                  'slide_show_name' =>$show->name,

              ]
              ]));
          // dd($show->screen_savers as );
          foreach($show->screen_savers as $screen_s){
                     // dd($screen_s);
                     if($screen_s->image!=null)
                   array_push($response_array,response()->file(public_path().'/storage/'.$screen_s->image));
                 }

          return $response_array;
     }
    public function activate_and_print_test($json){
        $decoded=json_decode($json);
        $res=$decoded->res;
        //$display=Display::find($decoded->dat;
        $view= View::first('print.success',  $res->data);
    /// faker come up with name

                    $name=Str::uuid(); //make that unique

                    Storage::disk('local')->put(''.$name.'.xml', $view); ///put fake name here
                    $print_file=PrintFile::firstOrCreate(['display_id'=>$res->data['display_id'],'file'=>$name]);
                    $display=Display::find($res->data['display_id']);
                    $display->print_files()->attach($print_file->id);
                    $display->print=true;
                    return response()->json([
                        'data'=>[
                            'display_id'=>$display->id,
                            'file_id'=>$display()->print_files()->with('id')->get(),
                            'print'=>$display->print,
                        ]
                    ]);
       }
       public function activate_and_print(Request $request){

        $decoded=$request->input('data');
        $res=$decoded;
    //$display=Display::find($decoded->dat;
        //$view=  View::make('print.success',$res)->render();
        $html = view('print.success', $res)->render();

/// faker come up with name

                $name=uniqid(); //make that unique

                Storage::disk('local')->put(''.$name.'.html',$html); ///put fake name here
                //dd($name.'.html');
                $print_file=PrintFile::firstOrNew(
                 ['display_id'=>$res['display_id']],['file'=>$name],['printed'=>false], ['html'=>$html]);
                    $print_file->file=$name;
                    $print_file->printed=false;
                    $print_file->html=$html;
                 $print_file->save();
                //dd($print_file);

                $display=Display::find($res['display_id']);
                $display->print_files()->attach($print_file->id);

                $display->print=true;
                $display->save();
                broadcast(new PrintSend($display));
        return response()->json([
            'display_id'=>$display->id,
            'print_file'=>$display->print_files(),
            'print'=>$display->print,
        ]);
    }
}
