<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
// use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class ScreenSaver extends Model
{
    protected $table='screen_savers';
    protected $guarded =["id"];
    protected $fillable=["image", "name", "published_since", "published_untill", "always", "forever","mini", "parent_id", "lft", "rgt", "depth" ];
    use HasFactory;
    use CrudTrait;

     public static function boot()
    {
    parent::boot();
    static::deleting(function($obj) {
        Storage::delete(Str::replaceFirst('storage/','public/', $obj->image));
    });
    }
    public function slide_shows(){
      return  $this->belongsToMany(SlideShow::class, 'slide_show_screen_saver','screen_saver_id','slide_show_id' );
    }
    public function reorderGroup($crud = false)
    {
        $shows=SlideShow::all();

        $buttons = '';

            $group = 'group=1';
            $buttons .= '
            <div class="btn-group">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.'Ustaw kolejność w Pokazach Slajdów'.'</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">';
            foreach ($shows as $show) {
                $buttons .= '<a class="dropdown-item" href="'.url($crud->route.'/reorder').'?'.$group.'">'.$show->name.'</a>';
            }
            $buttons .= '</div>
                </div>
            </div>';

        return $buttons;
    }
    public function setImageAttribute($value)
    {
    $attribute_name = "image";
    // destination path relative to the disk above
    $disk = "public";
    $destination_path = "public/images";

    // // if the image was erased
    // if ($value==null) {
    //     // delete the image from disk
    //     Storage::delete($this->{$attribute_name});

    //     // set null in the database column
    //     $this->attributes[$attribute_name] = null;
    // }

    // // if a base64 was sent, store it in the db
    // if (Str::startsWith($value, 'data:image'))
    // {
    //     // 0. Make the image
    //     $image = Image::make($value)->encode('jpg', 90);

    //     // 1. Generate a filename.
    //     $filename = md5($value.time()).'.jpg';

    //     // 2. Store the image on disk.
    //     Storage::put($destination_path.'/'.$filename, $image->stream());

    //     // 3. Delete the previous image, if there was one.
    //     Storage::delete(Str::replaceFirst('storage/','public/', $this->{$attribute_name}));

    //     // 4. Save the public path to the database
    //     // but first, remove "public/" from the path, since we're pointing to it
    //     // from the root folder; that way, what gets saved in the db
    //     // is the public URL (everything that comes after the domain name)
    //     $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);

    // }
    $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    // return  $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
}
// public function uploadFileToDisk($value, $attribute_name, $disk, $destination_path)
//     {
//         // if a new file is uploaded, delete the file from the disk
//         if (request()->hasFile($attribute_name) &&
//             $this->{$attribute_name} &&
//             $this->{$attribute_name} != null) {
//             \Storage::disk($disk)->delete($this->{$attribute_name});
//             $this->attributes[$attribute_name] = null;
//         }

//         // if the file input is empty, delete the file from the disk
//         if (is_null($value) && $this->{$attribute_name} != null) {
//             \Storage::disk($disk)->delete($this->{$attribute_name});
//             $this->attributes[$attribute_name] = null;
//         }

//         // if a new file is uploaded, store it on disk and its filename in the database
//         if (request()->hasFile($attribute_name) && request()->file($attribute_name)->isValid()) {
//             // 1. Generate a new file name
//             $file = request()->file($attribute_name);
//             $new_file_name = md5($file->getClientOriginalName().random_int(1, 9999).time()).'.'.$file->getClientOriginalExtension();

//             // 2. Move the new file to the correct path
//             $file_path = $file->storeAs($destination_path, $new_file_name, $disk);

//             // 3. Save the complete path to the database
//             $this->attributes[$attribute_name] = $file_path;
//         }
//     }
    public function scopeScheduler($query, $start_date, $end_date){
       return $query->where('published_since', '>', $start_date)->orWhere(function($query) {
            $query->where('published_untill','<', $end_date);

        });
    }
}
