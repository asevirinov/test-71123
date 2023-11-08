<?php

namespace App\Models;

use App\Casts\Photos;
use App\Enums\CabinCategoryType;
use App\Models\Scopes\SortedScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CabinCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'vendor_code',
        'type',
        'description',
        'photos',
        'ordering',
        'state',
    ];

    protected $attributes = [
        'type' => null,
        'photos' => null,
        'ordering' => 9999,
        'state' => 0,
    ];

    protected $casts = [
        'type' => CabinCategoryType::class,
        'photos' => Photos::class,
        'state' => 'boolean',
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
