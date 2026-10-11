<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'caption',
        'event_date',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeOrdered($query)
    {
        return $query->where('is_active', true)->orderByDesc('sort_order')->orderByDesc('id');
    }

    /**
     * Full, browser-ready URL for the stored image, whether it was
     * seeded from /public/images or uploaded via the admin panel
     * (stored under storage/app/public and served via /storage).
     */
    public function getImageUrlAttribute(): string
    {
        return asset($this->image);
    }
}
