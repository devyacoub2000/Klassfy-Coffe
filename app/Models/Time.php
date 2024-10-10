<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Time extends Model
{
    use HasFactory, Trans;
    
    protected $guarded = [];

    public function reservations() {

        return $this->hasMany(Reservation::class);

    }

    public function food() {
        return $this->hasMany(Food::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable')->withDefault([
               'path' => 'images/noo_imagee.jpg',
        ])->where('type', 'main');
    }

}
