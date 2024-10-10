<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Food extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];
    
    public function time() {
        return $this->belongsTo(Time::class)->withDefault();
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable')->withDefault([
               'path' => 'images/noo_imagee.jpg',
        ])->where('type', 'main');
    }
}
