<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Roster;

class Classroom extends Model
{
    public $fillable = ['name', 'description', 'capacity', 'is_available', 'date', 'roster_id'];

    public function roster()
    {
        return $this->belongsTo(Roster::class);
    }
}
