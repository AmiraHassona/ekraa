<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    protected function createdAt():Attribute
    {
    return Attribute::make(
       get: fn ($value) => Carbon::make($value)->diffForHumans(),
    );
    }
}
