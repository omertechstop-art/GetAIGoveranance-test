<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$blog = \App\Models\Blog::where('slug', 'ai-governance-best-practices-dos-and-donts')->first();

if ($blog) {
    $blog->update([
        'content' => file_get_contents(__DIR__.'/blog_content.html'),
        'author_name' => 'Sarah Johnson',
        'author_image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
        'table_of_contents' => [
            'Introduction to AI Governance',
            'Why AI Governance Matters',
            'Best Practices for AI Governance',
            'Common Pitfalls to Avoid',
            'Implementation Strategies',
            'Measuring Governance Success'
        ]
    ]);
    echo "Blog updated successfully!\n";
} else {
    echo "Blog not found\n";
}
