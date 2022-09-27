<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Display extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    protected $table='displays';
    protected $fillable=["name","print", 'channel'];
    use HasFactory;
    use CrudTrait;
    public function print_files(){
        return $this->belongsToMany(PrintFile::class,'display_print_file', 'display_id','print_file_id' );
    }
    public function slide_show(){
        return  $this->belongsTo(SlideShow::class, "slide_show_id", "id");
     }
}
