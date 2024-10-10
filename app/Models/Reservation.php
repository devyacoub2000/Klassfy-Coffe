<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function time() {
        return $this->belongsTo(Time::class)->withDefault();
    }

}
