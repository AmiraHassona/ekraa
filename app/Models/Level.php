<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function departments(){
        return $this->hasMany(Department::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }

    protected function createdAt():Attribute
    {
    return Attribute::make(
       get: fn ($value) => carbon::make($value)->diffForHumans(),
    );
    }
}
