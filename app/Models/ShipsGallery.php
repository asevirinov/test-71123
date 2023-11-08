<?php

namespace App\Models;

use App\Models\Scopes\SortedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipsGallery extends Model
{
    protected $table = 'ships_gallery';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'url',
        'ordering',
    ];

    protected $attributes = [
        'ordering' => 9999,
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new SortedScope);
    }

    public function ship(): BelongsTo
    {
        return $this->belongsTo(Ship::class);
    }
}
