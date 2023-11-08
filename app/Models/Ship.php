<?php

namespace App\Models;

use App\Models\Scopes\SortedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ship extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'spec',
        'description',
        'ordering',
        'state',
    ];

    protected $attributes = [
        'ordering' => 9999,
        'state' => 0,
    ];

    protected $casts = [
        'spec' => 'array',
        'state' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new SortedScope);
    }

    public function cabinCategories(): HasMany
    {
        return $this->hasMany(CabinCategory::class)->whereState(1);
    }

    public function shipGallery(): HasMany
    {
        return $this->hasMany(ShipsGallery::class);
    }
}
