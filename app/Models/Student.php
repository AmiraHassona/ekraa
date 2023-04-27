<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function courses(){
        return $this->hasMany(StudentCourse::class);
    }

    protected function createdAt():Attribute
    {
    return Attribute::make(
       get: fn ($value) => Carbon::make($value)->diffForHumans(),
    );
    }
}
