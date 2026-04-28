<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    protected $table = 'animaux';
    
    protected $fillable = [
        'animal_id',
        'nom',
        'slug',
        'race',         // Changé : 'raza' → 'race'
        'description',  // Changé : 'descripcion' → 'description'
        'images',       // Changé : 'imagenes' → 'images'
        'lien',         // Changé : 'enlace' → 'lien'
        'prix',         // Changé : 'precio' → 'prix'
        'race_id'
    ];
    
    protected $casts = [
        'images' => 'array',
    ];
    
    // Relation avec la race
    public function races(): BelongsTo
    {
        return $this->belongsTo(Race::class, 'race_id');
    }
    
    // Accesseur pour récupérer la première image
    public function getFirstImageAttribute(): ?string
    {
        $images = $this->images;
        return is_array($images) && !empty($images) ? $images[0] : null;
    }
    
    // Accesseur pour le nombre d'images
    public function getImagesCountAttribute(): int
    {
        $images = $this->images;
        return is_array($images) ? count($images) : 0;
    }
}