<?php

namespace Database\Seeders;

use App\Models\MarketplaceCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MarketplaceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $parentCategories = [
            [
                'name' => 'AI Governance',
                'description' => 'Comprehensive AI governance and management platforms',
                'detailed_description' => 'End-to-end platforms that provide centralized governance, policy management, and oversight for AI systems across the enterprise.',
                'icon' => 'shield-check',
                'color' => '#3B82F6',
                'sort_order' => 1,
                'is_featured' => true,
                'subcategories' => [
                    'Governance Platforms',
                    'Policy Management',
                    'Risk Assessment',
                    'Compliance Tools'
                ]
            ],
            [
                'name' => 'AI Security and Monitoring',
                'description' => 'Tools for monitoring AI model performance and security',
                'detailed_description' => 'Solutions that track model performance, detect drift, monitor predictions, and ensure AI system security.',
                'icon' => 'chart-line',
                'color' => '#10B981',
                'sort_order' => 2,
                'is_featured' => true,
                'subcategories' => [
                    'Model Monitoring',
                    'AI Security',
                    'Bias Detection',
                    'Explainability'
                ]
            ],
            [
                'name' => 'Operations',
                'description' => 'MLOps and operational tools for AI systems',
                'detailed_description' => 'Platforms and tools for managing AI operations, deployment, and lifecycle management.',
                'icon' => 'cog',
                'color' => '#8B5CF6',
                'sort_order' => 3,
                'is_featured' => true,
                'subcategories' => [
                    'MLOps Platforms',
                    'Data Management',
                    'Version Control',
                    'Testing Tools'
                ]
            ]
        ];

        foreach ($parentCategories as $parentData) {
            $subcategories = $parentData['subcategories'];
            unset($parentData['subcategories']);
            
            $parent = MarketplaceCategory::create([
                ...$parentData,
                'slug' => Str::slug($parentData['name']),
                'meta_title' => $parentData['name'] . ' - AI Governance Tools',
                'meta_description' => $parentData['description']
            ]);

            foreach ($subcategories as $index => $subcategoryName) {
                MarketplaceCategory::create([
                    'name' => $subcategoryName,
                    'slug' => Str::slug($subcategoryName),
                    'description' => 'Tools and solutions for ' . strtolower($subcategoryName),
                    'detailed_description' => 'Specialized tools and platforms focused on ' . strtolower($subcategoryName) . ' in AI systems.',
                    'icon' => 'tool',
                    'color' => $parent->color,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                    'is_featured' => false,
                    'parent_id' => $parent->id,
                    'meta_title' => $subcategoryName . ' - AI Governance Tools',
                    'meta_description' => 'Tools and solutions for ' . strtolower($subcategoryName)
                ]);
            }
        }
    }
}
