<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    protected $fillable = ['term', 'year'];
    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }
}
