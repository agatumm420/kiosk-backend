<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class SlideShow extends Model
{    protected $fillable=['name'];
    use HasFactory;
    use CrudTrait;
    public function screen_savers(){
       return $this->belongsToMany(ScreenSaver::class, 'slide_show_screen_saver','screen_saver_id','slide_show_id');
    }
    public function displays(){
        return $this->belongsToMany(Display::class, 'displays_slide_shows', 'slide_show_id', 'display_id');
    }
}
