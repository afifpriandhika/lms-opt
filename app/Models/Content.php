<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'description',
        'material',
        'video',
        'file',
        'status',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
