<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Trans;

class Chef extends Model
{
    use HasFactory, Trans;

    protected $guarded = [];

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

  

}
