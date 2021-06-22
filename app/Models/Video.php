<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'image',
        'video_link',
        'cat_id',
    ];

    public function category(){
       return $this->belongsTo(Category::class,'cat_id','id');
    }
}
