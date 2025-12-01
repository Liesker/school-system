<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objection extends Model
{
    protected $fillable = [
        'presence_id',
        'description',
    ];

    public function presence()
    {
        return $this->belongsTo(Presence::class);
    }
}
