<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintFile extends Model
{
    protected $table='print_files';
    protected $fillable=[ 'display_id',' file'];
    use HasFactory;
    public function display(){
        return $this->hasOne(Display::class);
    }
}
