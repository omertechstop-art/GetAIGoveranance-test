<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MarketplaceCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'detailed_description',
        'icon',
        'color',
        'meta_title',
        'meta_description',
        'sort_order',
        'is_active',
        'is_featured',
        'parent_id'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MarketplaceCategory::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(MarketplaceCategory::class, 'parent_id');
    }

    public function vendors()
    {
        return Vendor::whereJsonContains('marketplace_categories', $this->id)->where('is_active', true);
    }

    public function getVendorsAttribute()
    {
        return $this->vendors()->get();
    }

    public function relatedBlogs()
    {
        return Blog::whereJsonContains('marketplace_category_tags', $this->id)->where('is_published', true);
    }

    public function relatedQAs()
    {
        return QA::whereJsonContains('marketplace_category_tags', $this->id)->where('is_published', true);
    }
}
