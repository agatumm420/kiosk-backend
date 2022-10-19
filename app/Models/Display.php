<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Display extends Model
{

    protected $table='displays';
    protected $fillable=["name","print", 'channel', 'slide_show_id', 'level', 'place', 'map-image'];
    use HasFactory;
    use CrudTrait;
    public function print_files(){
        return $this->belongsToMany(PrintFile::class,'display_print_file', 'display_id','print_file_id' );
    }
    public function slide_show(){
        return  $this->belongsTo(SlideShow::class, "slide_show_id", "id");
     }
     public function minis(){
        return $this->belongsToMany(Mini::class,'minis_displays', 'display_id', 'mini_id' );
     }
     public function setImageAttribute($value)
     {
     $attribute_name = "map-image";
     // destination path relative to the disk above
     $disk = "public";
     $destination_path = "public/map-images";

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

}
