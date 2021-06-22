<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'image',
        'audio_link',
        
    ];

    // public function category(){
    //    return $this->belongsTo(Category::class,'cat_id','id');
    // }
}
