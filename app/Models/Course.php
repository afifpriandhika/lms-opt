<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EnrolledCourse;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'enrollment_key',
        'status',
    ];
    
    public function contents(): HasMany
    {
        return $this->hasMany(Content::class);
    }

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function enrolledCourse()
    {
        return $this->belongsTo(EnrolledCourse::class);
    }
}


