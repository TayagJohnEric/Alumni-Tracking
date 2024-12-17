<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  
    protected $table = "courses";

    protected $fillable = ['course_name',
                           'course_code']; // Add other fillable fields if necessary.

    // One-to-Many relationship with Alumni
    public function alumni()
    {
        return $this->hasMany(Alumni::class);
    }

}