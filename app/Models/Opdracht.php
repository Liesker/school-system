<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opdracht extends Model
{
    use HasFactory;

    protected $table = 'opdracht';

    protected $fillable = [
        'naam',
        'beschrijving',
        'uitleg',
        'module_id',
    ];

    // Relatie: Opdracht hoort bij een Module
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
