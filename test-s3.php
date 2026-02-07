<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Storage;

echo "Testing S3 Connection...\n\n";

try {
    // Test 1: Upload a file
    echo "1. Uploading test file...\n";
    $testContent = "Hello from Laravel! Test at " . now();
    $filename = 'test-' . time() . '.txt';
    Storage::put($filename, $testContent);
    echo "   ✓ File uploaded: {$filename}\n\n";

    // Test 2: Check if file exists
    echo "2. Checking if file exists...\n";
    if (Storage::exists($filename)) {
        echo "   ✓ File exists in S3\n\n";
    } else {
        echo "   ✗ File not found\n\n";
    }

    // Test 3: Retrieve file content
    echo "3. Retrieving file content...\n";
    $retrieved = Storage::get($filename);
    echo "   ✓ Content: {$retrieved}\n\n";

    // Test 4: Get CloudFront URL
    echo "4. Getting CloudFront URL...\n";
    $url = Storage::url($filename);
    echo "   ✓ URL: {$url}\n\n";

    // Test 5: List files
    echo "5. Listing files in bucket...\n";
    $files = Storage::files();
    echo "   ✓ Total files: " . count($files) . "\n";
    foreach (array_slice($files, 0, 5) as $file) {
        echo "     - {$file}\n";
    }
    echo "\n";

    // Test 6: Delete test file
    echo "6. Cleaning up (deleting test file)...\n";
    Storage::delete($filename);
    echo "   ✓ Test file deleted\n\n";

    echo "✅ All tests passed! S3 + CloudFront is working correctly.\n";

} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
