<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$blogs = \App\Models\Blog::where('is_published', true)
    ->orderBy('published_at', 'desc')
    ->take(3)
    ->get();

foreach($blogs as $blog) {
    $blog->is_featured = true;
    $blog->save();
    echo "Set featured: {$blog->title}\n";
}

echo "\nTotal featured: " . $blogs->count() . " blogs\n";
