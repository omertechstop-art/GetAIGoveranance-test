<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    protected $fillable = [
        'question',
        'slug',
        'answer',
        'vendor_tags',
        'marketplace_category_tags',
        'meta_title',
        'meta_description',
        'view_count',
        'is_published',
        'is_featured',
        'published_at'
    ];

    protected $casts = [
        'vendor_tags' => 'array',
        'marketplace_category_tags' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function taggedVendors()
    {
        if (!$this->vendor_tags) return collect();
        return Vendor::whereIn('id', $this->vendor_tags)->get();
    }

    public function taggedMarketplaceCategories()
    {
        if (!$this->marketplace_category_tags) return collect();
        return MarketplaceCategory::whereIn('id', $this->marketplace_category_tags)->get();
    }

    public function incrementViews()
    {
        $this->increment('view_count');
    }
}
