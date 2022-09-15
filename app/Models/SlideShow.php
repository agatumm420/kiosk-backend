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
       return $this->belongsToMany(ScreenSaver::class, 'slide_show_sreen_saver', 'slide_show_id','screen_saver_id',);
    }
    public function displays(){
        return $this->hasMany(Display::class);
    }
}
