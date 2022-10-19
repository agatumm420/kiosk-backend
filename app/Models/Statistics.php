<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $fillable=['promotion_id', 'week', 'day', 'clicks'];
    use HasFactory;
}
