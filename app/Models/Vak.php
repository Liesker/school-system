<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vak extends Model
{
    use HasFactory;

    protected $table = 'vak';

    protected $fillable = [
        'naam',
        'beschrijving',
        'afbeelding',
    ];

    // Relatie: Vak heeft meerdere Modules
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    // Relatie: Vak hoort bij meerdere Gidsen (M:N)
    public function gidsen()
    {
        return $this->belongsToMany(Gids::class, 'gids_vak', 'vak_id', 'gids_id');
    }
}
