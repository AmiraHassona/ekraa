<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

protected $fillable =['name','level_id'];

    public function level(){
        return $this->belongsTo(Level::class);
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
       get: fn ($value) => Carbon::make($value)->diffForHumans(),
    );
    }
}
