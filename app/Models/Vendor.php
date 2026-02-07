<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'website_url',
        'logo',
        'company_size',
        'pricing_model',
        'key_features',
        'use_cases',
        'target_audience',
        'marketplace_categories',
        'meta_title',
        'meta_description',
        'click_count',
        'is_featured',
        'is_active',
        'verified_at'
    ];

    protected $casts = [
        'marketplace_categories' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'verified_at' => 'datetime'
    ];

    protected $appends = ['logo_url'];

    protected static function booted()
    {
        static::updating(function ($vendor) {
            if ($vendor->isDirty('logo') && $vendor->getOriginal('logo')) {
                Storage::disk('s3')->delete($vendor->getOriginal('logo'));
            }
        });

        static::deleting(function ($vendor) {
            if ($vendor->logo) {
                Storage::disk('s3')->delete($vendor->logo);
            }
        });
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? Storage::disk('s3')->url($this->logo) : null;
    }

    public function categories()
    {
        if (!$this->marketplace_categories) return collect();
        return MarketplaceCategory::whereIn('id', $this->marketplace_categories)->get();
    }

    public function relatedBlogs()
    {
        return Blog::whereJsonContains('vendor_tags', $this->id)->where('is_published', true);
    }

    public function relatedQAs()
    {
        return QA::whereJsonContains('vendor_tags', $this->id)->where('is_published', true);
    }

    public function incrementClicks()
    {
        $this->increment('click_count');
    }
}
