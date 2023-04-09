<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;

class EnrolledCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
    ];
    
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
