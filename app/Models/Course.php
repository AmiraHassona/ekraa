<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable =['title','image','description','price','level_id','department_id',];

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function lectures(){
        return $this->hasMany(Lecture::class);
    }

    public function students(){
        return $this->hasMany(StudentCourse::class);
    }

    protected function createdAt():Attribute
    {
    return Attribute::make(
       get: fn ($value) => Carbon::make($value)->diffForHumans(),
    );
    }
}
