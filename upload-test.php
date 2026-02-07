<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Storage;

echo "Uploading file to S3...\n\n";

try {
    $filename = 'laravel-test-' . date('Y-m-d-H-i-s') . '.txt';
    $content = "This is a test file uploaded from Laravel at " . now() . "\n";
    $content .= "Bucket: getaigovernance\n";
    $content .= "Region: eu-north-1\n";
    
    Storage::put($filename, $content);
    
    echo "✅ File uploaded successfully!\n\n";
    echo "Filename: {$filename}\n";
    echo "CloudFront URL: " . Storage::url($filename) . "\n";
    echo "S3 Path: s3://getaigovernance/{$filename}\n\n";
    echo "Check your S3 bucket now!\n";

} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
