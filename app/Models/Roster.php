<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    protected $fillable = ['term', 'classyear', 'day', 'start_time', 'end_time', 'lesson_hour', 'class_number'];

    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }
}
