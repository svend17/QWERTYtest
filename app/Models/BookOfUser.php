<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOfUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
