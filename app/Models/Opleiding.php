<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opleiding extends Model
{
    protected $table = 'opleidingen';
    
    protected $fillable = [
        'naam',
        'omschrijving',
    ];

    public function klassen(): HasMany
    {
        return $this->hasMany(Klas::class);
    }

    public function afdelingen(): HasMany
    {
        return $this->hasMany(Afdeling::class);
    }
}