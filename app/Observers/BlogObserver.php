<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogObserver
{
    public function saving(Blog $blog): void
    {
        if ($blog->isDirty('content')) {
            $blog->content = $this->formatContent($blog->content);
        }
    }

    private function formatContent(string $content): string
    {
        // Convert bold text in paragraphs to H2 headings with IDs
        $content = preg_replace_callback(
            '/<p><strong>([^<]+)<\/strong><\/p>/',
            function ($matches) {
                $heading = trim($matches[1]);
                $id = Str::slug($heading);
                return "<h2 id=\"{$id}\">{$heading}</h2>";
            },
            $content
        );

        // Convert S3 paths to full URLs for images
        $content = preg_replace_callback(
            '/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/',
            function ($matches) {
                $src = $matches[1];
                // If it's already a full URL, leave it
                if (str_starts_with($src, 'http')) {
                    return $matches[0];
                }
                // Convert S3 path to URL
                $url = \Storage::disk('s3')->url($src);
                return str_replace($src, $url, $matches[0]);
            },
            $content
        );

        return $content;
    }
}
