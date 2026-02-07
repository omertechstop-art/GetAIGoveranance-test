<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        $vendors = [
            [
                'name' => 'DataRobot',
                'short_description' => 'Enterprise AI platform with built-in governance and monitoring',
                'description' => 'DataRobot provides a comprehensive AI platform that includes model governance, monitoring, and compliance features designed for enterprise deployments.',
                'website_url' => 'https://datarobot.com',
                'company_size' => 'enterprise',
                'pricing_model' => 'enterprise',
                'key_features' => 'Model monitoring, Bias detection, Compliance reporting, Model registry',
                'use_cases' => 'Enterprise AI governance, Model lifecycle management, Regulatory compliance',
                'target_audience' => 'Large enterprises, Financial services, Healthcare organizations',
                'marketplace_categories' => [1, 2], // Governance Platforms, Model Monitoring
                'is_featured' => true,
                'verified_at' => now()
            ],
            [
                'name' => 'Weights & Biases',
                'short_description' => 'MLOps platform with experiment tracking and model monitoring',
                'description' => 'W&B offers tools for experiment tracking, model versioning, and production monitoring with governance features for ML teams.',
                'website_url' => 'https://wandb.ai',
                'company_size' => 'medium',
                'pricing_model' => 'freemium',
                'key_features' => 'Experiment tracking, Model versioning, Performance monitoring, Team collaboration',
                'use_cases' => 'ML experiment management, Model monitoring, Team collaboration',
                'target_audience' => 'ML teams, Data scientists, AI researchers',
                'marketplace_categories' => [2], // Model Monitoring
                'is_featured' => true,
                'verified_at' => now()
            ],
            [
                'name' => 'Robust Intelligence',
                'short_description' => 'AI security and validation platform',
                'description' => 'Robust Intelligence provides AI security testing, validation, and monitoring to ensure AI systems are safe and reliable.',
                'website_url' => 'https://robustintelligence.com',
                'company_size' => 'startup',
                'pricing_model' => 'paid',
                'key_features' => 'AI security testing, Model validation, Adversarial attack detection, Continuous monitoring',
                'use_cases' => 'AI security, Model validation, Risk assessment',
                'target_audience' => 'Security teams, AI engineers, Compliance officers',
                'marketplace_categories' => [3, 5], // AI Security, Risk Assessment
                'is_featured' => false,
                'verified_at' => now()
            ],
            [
                'name' => 'Fiddler AI',
                'short_description' => 'Model performance management and explainability platform',
                'description' => 'Fiddler provides model monitoring, explainability, and fairness tools to help organizations build trustworthy AI.',
                'website_url' => 'https://fiddler.ai',
                'company_size' => 'startup',
                'pricing_model' => 'paid',
                'key_features' => 'Model explainability, Performance monitoring, Bias detection, Drift detection',
                'use_cases' => 'Model monitoring, AI explainability, Bias mitigation',
                'target_audience' => 'Data scientists, Model risk managers, Compliance teams',
                'marketplace_categories' => [2, 5], // Model Monitoring, Risk Assessment
                'is_featured' => true,
                'verified_at' => now()
            ]
        ];

        foreach ($vendors as $vendor) {
            Vendor::create([
                ...$vendor,
                'slug' => Str::slug($vendor['name']),
                'meta_title' => $vendor['name'] . ' - AI Governance Tool Review',
                'meta_description' => $vendor['short_description']
            ]);
        }
    }
}
