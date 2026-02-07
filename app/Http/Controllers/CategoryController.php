<?php

namespace App\Http\Controllers;

use App\Models\MarketplaceCategory;
use App\Models\Vendor;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(MarketplaceCategory $category)
    {
        $vendors = Vendor::where('marketplace_categories', 'like', '%"' . $category->id . '"%')
            ->where('is_active', true)
            ->paginate(12);

        return view('userfront.category', compact('category', 'vendors'));
    }

    public function subcategory(MarketplaceCategory $parent, MarketplaceCategory $child)
    {
        $vendors = Vendor::where('marketplace_categories', 'like', '%"' . $child->id . '"%')
            ->where('is_active', true)
            ->paginate(12);

        return view('userfront.subcategory', compact('parent', 'child', 'vendors'));
    }
}