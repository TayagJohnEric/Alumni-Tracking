<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumni";

    protected $fillable = [
        'employment_status_id',
        'course_id',
        'fullname',
        'age',
        'dob',
        'civilstatus',
        'sex',
        'religion',
        'street',
        'barangay',
        'municipality',
        'province',
        'region',
        'zipcode',
        'batch',
        'facebook',
        'organization',
        'profession',
        'type',
        'location',
        'status',
        'number',
        'expectedincome',
        'relatedfield',
        'reason',
        'company',
        'num',
        'incomerange',
        'phone',
        'email',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Belongs to Employment Status
    public function employmentStatus()
    {
        return $this->belongsTo(EmploymentStatus::class);
    }
}