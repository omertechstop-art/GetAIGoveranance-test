<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $parentCategories = [
            [
                'name' => 'Best Practices',
                'description' => 'Implementation guides and best practices for AI governance',
                'color' => '#3B82F6',
                'sort_order' => 1,
                'subcategories' => [
                    'Implementation Guides',
                    'Framework Comparisons',
                    'Success Stories'
                ]
            ],
            [
                'name' => 'Industry Insights',
                'description' => 'Market trends and industry analysis in AI governance',
                'color' => '#10B981',
                'sort_order' => 2,
                'subcategories' => [
                    'Market Trends',
                    'Regulatory Updates',
                    'Expert Opinions'
                ]
            ],
            [
                'name' => 'Technical Resources',
                'description' => 'Technical guides and resources for AI implementation',
                'color' => '#F59E0B',
                'sort_order' => 3,
                'subcategories' => [
                    'API Documentation',
                    'Integration Methods',
                    'Code Examples'
                ]
            ]
        ];

        foreach ($parentCategories as $parentData) {
            $subcategories = $parentData['subcategories'];
            unset($parentData['subcategories']);
            
            $parent = BlogCategory::create([
                ...$parentData,
                'slug' => Str::slug($parentData['name'])
            ]);

            foreach ($subcategories as $index => $subcategoryName) {
                BlogCategory::create([
                    'name' => $subcategoryName,
                    'slug' => Str::slug($subcategoryName),
                    'description' => 'Articles about ' . strtolower($subcategoryName),
                    'color' => $parent->color,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                    'parent_id' => $parent->id
                ]);
            }
        }
    }
}
