<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    protected $table = "employment_status";
      

    protected $fillable = ['status'];

    public function alumni()
    {
        return $this->hasMany(Alumni::class);
    }

}