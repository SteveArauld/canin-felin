<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
{
    protected $table = 'races';

    protected $fillable = [
        'nom', 'slug', 'categorie', 'description', 'taille', 
        'poids', 'esperance_vie', 'prix_moyen', 'image', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function animaux(): HasMany
    {
        return $this->hasMany(Animal::class, 'race_id');
    }
}