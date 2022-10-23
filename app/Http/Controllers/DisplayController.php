<?php

namespace App\Http\Controllers;

use App\Events\PrintSend;
use App\Models\SlideShow;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\Display;
use App\Models\PrintFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class Slider{
    public $src;
    public $name;
    public function __constructor($src, $name){
        $this->src=$src;
        $this->name=$name;
    }
}
class SliderFactory{
    public static function create($src, $name){
        return new Slider($src, $name);
    }
}
class DisplayController extends Controller
{
    public function set_socketId(Request $request){
        $res=$request->input('data');
        //dd($res);
        $display=Display::where('channel', $res['channel'])->get();
        $display[0]->socketId=$res['socketId'];
        $display[0]->online=true;
        $display[0]->save();
        return response()->json([
            'data'=>[
                'channel'=>$display[0]->channel,
                'socketId'=>$display[0]->socketId
            ]
        ]);
    }

    public function register_display(Request $request){
        $res=$request->input('data');
        $display=Display::firstOrNew(['channel'=>$res['channel']], ['name'=>$res['name']], ['print'=>false]);
        $display->channel=$res['channel'];
        $display->name=$res['name'];
        $display->print=false;
        $display->save();
        return response()->json([
            'data'=>[
                'id'=>$display->id,
                'name'=>$display->name,
                'channel'=>$display->channel,

            ]
        ]);
    }
    public function get_slide_show(Display $display){
        // $user = auth('api')->user() ?? null;
      //    foreach($display->slide_show()->screen_savers() as $screen_s){
      //       $screen_s->image;
      //       response()->file($screen_s->image);
      //    }
          //$show=$display->slide_show();
         // dd($display->slide_show_id);



         $show=SlideShow::find($display->slide_show_id);
        //dd($show->screen_savers);
          // dd($show->screen_savers as );
        //   foreach($show->screen_savers as $screen_s){
        //              // dd($screen_s);
        //              if($screen_s->image!=null)
        //            array_push($response_array,response()->file(public_path().'/storage/'.$screen_s->image));
        //          }
        $screen_savers=$show->screen_savers()->where('published_untill','>=', Carbon::now())

        ->where('published_since','<=', Carbon::now())



        ->get()->toArray();
        //dd($screen_savers);
            $screen_savers_maped=array_map(function($obj){
               //return

               $slider_var=new Slider('https://ws.galaxy-centrum.pl/storage/'.$obj['image'], $obj['name'] );
               $slider_var->src=$obj['image'];
               $slider_var->name=$obj['name'];
               //dd($slider_var);
                return $slider_var;
            },$screen_savers);
            //dd($screen_savers_maped);
            $minis=$display->minis()->where('published_untill','>=', Carbon::now())

            ->where('published_since','<=', Carbon::now())

            ->get()->toArray();

            $minis_mapped=array_map(function($obj){

                $slider_var=new Slider('https://ws.galaxy-centrum.pl/storage/'.$obj['image'], $obj['name'] );
               $slider_var->src=$obj['image'];
               $slider_var->name=$obj['name'];
               //dd($slider_var);
                return $slider_var;
            },$minis);
            //dd($minis_mapped);
            $startTime;
            $endTime;
            $day_of_week=date('w', strtotime(Carbon::now()));
            //$day_of_week=date('w', strtotime(Carbon::now()->addDays(3)));
            //dd($day_of_week);
            if($day_of_week=0){ //czy jest 0
                //jeśli handlowa
               $startTime=Carbon::now()->todateString().' 09:00:00';
               $endTime=Carbon::now()->todateString().' 20:00:00';
            }
            else{
                $startTime=Carbon::now()->todateString().' 07:30:00';
               $endTime=Carbon::now()->todateString().' 22:00:00';
            }

          return response()->json([
            "slider"=> $minis_mapped,
            "full_screen_slider"=> $screen_savers_maped,
            "wayfinder_id"=> $display->wayfinder_id,
            'startTime'=>$startTime,

            'finishTime'=>$endTime,

          ]);
     }
     public function get_displays(){
       return Display::all(); //czy mogą być dwa w tej samej
     }
     public function get_schedule(Request $request,Display $display){
        $res=$request->input('data');
        $request_date= Carbon::create($res['year'], $res['month'], 1);
        $end_date= Carbon::create($res['year'], $res['month'], 30);
      //  $show=SlideShow::where('id',$display->slide_show_id);
      $show=SlideShow::find($display->slide_show_id);
       // return $show->screen_savers()->where('publish_since', '>', $request_date)->where('published_since', '<',$request_date->endOfMonth())->where('published_since', null)->get();
     // DB::table()
        //return $show->screen_savers()->whereBetween('publish_since', [$request_date, $request_date->endOfMonth()])->get();
        //dd( $request_date->endOfMonth());
       // return $show->screen_savers()->where('publish_since', '>', $request_date)->get(); //second  where doesn t work
        //   return response()->json([
        //     'data'=>[

        //     ]
        //     ]);
       // dd($show->screen_savers);
        $screen_savers=collect($show->screen_savers()->get())->toArray();
            //dd($screen_savers);
        $minis=collect($display->minis()->get())->toArray();
        //   return response()->json([
        //     'data'=>[
        //         'screen_savers'=>$screen_savers,
        //         'minis'=>$minis,
        //     ]
        //     ]);
        return array_merge($screen_savers, $minis);
     }
     public function get_minis(Display $display){
        return $display->minis;
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


                $display->save();
                broadcast(new PrintSend($display));
        return response()->json([
            'display_id'=>$display->id,
            'print_file'=>$display->print_files(),
            'print'=>$display->print,
        ]);
    }
}
