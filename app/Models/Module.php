<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'module';

    protected $fillable = [
        'naam',
        'beschrijving',
        'afbeelding',
        'vak_id',
    ];

    // Relatie: Module hoort bij een Vak
    public function vak()
    {
        return $this->belongsTo(Vak::class);
    }

    // Relatie: Module heeft meerdere Opdrachten
    public function opdrachten()
    {
        return $this->hasMany(Opdracht::class);
    }
}
