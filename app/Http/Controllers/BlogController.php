<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function show(Blog $blog)
    {
        if (!$blog->is_published) {
            abort(404);
        }
        
        // Add IDs to headings in content for TOC linking
        if ($blog->table_of_contents) {
            $content = $blog->content;
            foreach ($blog->table_of_contents as $heading) {
                $id = Str::slug($heading);
                // Find h2 or h3 tags containing this heading and add ID
                $content = preg_replace(
                    '/(<h[23][^>]*>)(' . preg_quote($heading, '/') . ')(<\/h[23]>)/i',
                    '$1<span id="' . $id . '"></span>$2$3',
                    $content,
                    1
                );
            }
            $blog->content = $content;
        }
        
        return view('userfront.blog-detail', compact('blog'));
    }
}
