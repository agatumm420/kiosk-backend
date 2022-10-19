<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable=["id", "name", "src", "slug", "clicks_today", "clicks_week", "clicks_total"];
    use HasFactory;

    public function statistics(){
        return $this->belongsToMany(Statistics::class, 'statistics','promotion_id', 'id');
    }

}
