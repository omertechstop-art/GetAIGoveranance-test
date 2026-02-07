<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'author_name',
        'author_image',
        'excerpt',
        'content',
        'content_images',
        'table_of_contents',
        'our_take',
        'has_our_take',
        'featured_image',
        'meta_title',
        'meta_description',
        'blog_category_id',
        'vendor_tags',
        'marketplace_category_tags',
        'read_time',
        'is_published',
        'is_featured',
        'published_at'
    ];

    protected $casts = [
        'vendor_tags' => 'array',
        'marketplace_category_tags' => 'array',
        'table_of_contents' => 'array',
        'content_images' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'has_our_take' => 'boolean',
        'published_at' => 'datetime'
    ];

    protected $appends = ['featured_image_url', 'author_image_url'];

    protected static function booted()
    {
        static::updating(function ($blog) {
            if ($blog->isDirty('featured_image') && $blog->getOriginal('featured_image')) {
                Storage::disk('s3')->delete($blog->getOriginal('featured_image'));
            }
            if ($blog->isDirty('author_image') && $blog->getOriginal('author_image')) {
                Storage::disk('s3')->delete($blog->getOriginal('author_image'));
            }
        });

        static::deleting(function ($blog) {
            if ($blog->featured_image) {
                Storage::disk('s3')->delete($blog->featured_image);
            }
            if ($blog->author_image) {
                Storage::disk('s3')->delete($blog->author_image);
            }
        });
    }

    public function getFeaturedImageUrlAttribute(): ?string
    {
        return $this->featured_image ? Storage::disk('s3')->url($this->featured_image) : null;
    }

    public function getAuthorImageUrlAttribute(): ?string
    {
        return $this->author_image ? Storage::disk('s3')->url($this->author_image) : null;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

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
}
