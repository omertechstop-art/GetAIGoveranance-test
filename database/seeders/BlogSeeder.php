<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = BlogCategory::all();
        
        $blogs = [
            [
                'title' => 'AI Governance Best Practices, Dos and Don\'ts',
                'slug' => 'ai-governance-best-practices-dos-and-donts',
                'excerpt' => 'Learn the essential best practices for implementing AI governance in your organization, including common pitfalls to avoid.',
                'featured_image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800',
                'content' => '<h2 id="introduction-to-ai-governance">Introduction to AI Governance</h2>
<p>AI governance is crucial for organizations deploying AI systems. It encompasses the frameworks, policies, and practices that ensure AI technologies are developed and used responsibly, ethically, and in compliance with regulations.</p>

<blockquote>
<p>"The question is not whether AI will transform our world, but whether we will govern it wisely." - AI Ethics Board</p>
</blockquote>

<h2 id="why-ai-governance-matters">Why AI Governance Matters</h2>
<p>As artificial intelligence becomes increasingly integrated into business operations, the need for robust governance frameworks has never been more critical.</p>

<h3>Key Benefits</h3>
<ul>
<li>Risk mitigation and compliance assurance</li>
<li>Enhanced trust and transparency</li>
<li>Improved decision-making processes</li>
<li>Protection against bias</li>
</ul>

<h2 id="implementation-example">Implementation Example</h2>
<p>Here\'s a simple Python script to validate AI model outputs:</p>

<pre><code class="language-python">import numpy as np
from sklearn.metrics import accuracy_score

def validate_model_output(predictions, ground_truth):
    """Validate AI model predictions against ground truth."""
    accuracy = accuracy_score(ground_truth, predictions)
    
    if accuracy < 0.85:
        print(f"Warning: Model accuracy {accuracy:.2f} below threshold")
        return False
    
    return True

# Example usage
predictions = np.array([1, 0, 1, 1, 0])
ground_truth = np.array([1, 0, 1, 0, 0])
is_valid = validate_model_output(predictions, ground_truth)
</code></pre>

<h2 id="best-practices">Best Practices</h2>
<ol>
<li><strong>Establish Clear Accountability</strong> - Define roles and responsibilities</li>
<li><strong>Implement Documentation</strong> - Maintain detailed records</li>
<li><strong>Conduct Risk Assessments</strong> - Regular evaluations</li>
<li><strong>Prioritize Transparency</strong> - Explainable AI systems</li>
</ol>

<h2 id="common-pitfalls">Common Pitfalls</h2>
<table>
<thead>
<tr>
<th>Pitfall</th>
<th>Impact</th>
<th>Solution</th>
</tr>
</thead>
<tbody>
<tr>
<td>Late governance implementation</td>
<td>High</td>
<td>Integrate from day one</td>
</tr>
<tr>
<td>Ignoring stakeholder input</td>
<td>Medium</td>
<td>Regular feedback loops</td>
</tr>
</tbody>
</table>

<h2 id="conclusion">Conclusion</h2>
<p>Effective AI governance requires ongoing commitment, diverse perspectives, and robust frameworks.</p>',
                'read_time' => 15,
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'author_name' => 'Sarah Johnson',
                'table_of_contents' => [
                    'Introduction to AI Governance',
                    'Why AI Governance Matters',
                    'Implementation Example',
                    'Best Practices',
                    'Common Pitfalls',
                    'Conclusion',
                ],
            ],
            [
                'title' => 'Implementing AI Model Monitoring: A Technical Guide',
                'slug' => 'implementing-ai-model-monitoring-technical-guide',
                'excerpt' => 'Learn how to implement comprehensive AI model monitoring with code examples and best practices.',
                'featured_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800',
                'content' => '<h2 id="what-is-ai-model-monitoring">What is AI Model Monitoring?</h2>
<p>AI model monitoring tracks model performance, data drift, and system health in production environments.</p>

<h2 id="setting-up-monitoring">Setting Up Monitoring</h2>
<p>Here\'s how to implement basic monitoring with Python:</p>

<pre><code class="language-python">import pandas as pd
from scipy import stats

class ModelMonitor:
    def __init__(self, baseline_data):
        self.baseline_data = baseline_data
    
    def detect_drift(self, new_data, threshold=0.05):
        statistic, p_value = stats.ks_2samp(self.baseline_data, new_data)
        if p_value < threshold:
            print(f"Data drift detected! p-value: {p_value:.4f}")
            return True
        return False
</code></pre>

<h2 id="alert-configuration">Alert Configuration</h2>
<p>Set up alerts using YAML:</p>

<pre><code class="language-yaml">alerts:
  - name: accuracy_drop
    condition: accuracy < 0.85
    severity: high
</code></pre>

<h2 id="best-practices">Best Practices</h2>
<ol>
<li>Monitor continuously, not periodically</li>
<li>Set appropriate alert thresholds</li>
<li>Document all monitoring decisions</li>
</ol>',
                'read_time' => 12,
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'table_of_contents' => [
                    'What is AI Model Monitoring?',
                    'Setting Up Monitoring',
                    'Alert Configuration',
                    'Best Practices',
                ],
            ],
            [
                'title' => 'Building Explainable AI Systems with Python',
                'slug' => 'building-explainable-ai-systems-with-python',
                'excerpt' => 'Practical guide to implementing explainability in your AI models using SHAP and LIME.',
                'featured_image' => 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=800',
                'content' => '<h2 id="why-explainability-matters">Why Explainability Matters</h2>
<p>Explainable AI (XAI) helps stakeholders understand how AI models make decisions.</p>

<h2 id="implementing-shap">Implementing SHAP</h2>
<pre><code class="language-python">import shap
import xgboost as xgb

model = xgb.XGBClassifier()
model.fit(X_train, y_train)

explainer = shap.TreeExplainer(model)
shap_values = explainer.shap_values(X_test)
</code></pre>

<h2 id="comparison-table">Comparison Table</h2>
<table>
<thead>
<tr>
<th>Method</th>
<th>Speed</th>
<th>Accuracy</th>
</tr>
</thead>
<tbody>
<tr>
<td>SHAP</td>
<td>Fast</td>
<td>High</td>
</tr>
<tr>
<td>LIME</td>
<td>Slow</td>
<td>Medium</td>
</tr>
</tbody>
</table>',
                'read_time' => 10,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'table_of_contents' => [
                    'Why Explainability Matters',
                    'Implementing SHAP',
                    'Comparison Table',
                ],
            ],
            [
                'title' => 'AI Compliance Automation with CI/CD Pipelines',
                'slug' => 'ai-compliance-automation-with-cicd-pipelines',
                'excerpt' => 'Automate AI compliance checks in your deployment pipeline.',
                'featured_image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800',
                'content' => '<h2 id="automating-compliance">Automating Compliance Checks</h2>
<p>Integrate compliance validation into your CI/CD pipeline.</p>

<h2 id="github-actions">GitHub Actions Workflow</h2>
<pre><code class="language-yaml">name: AI Compliance Check
on: [push]
jobs:
  compliance:
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v2
    - name: Run bias detection
      run: python scripts/check_bias.py
</code></pre>

<h2 id="best-practices">Best Practices</h2>
<p>Run compliance checks on every commit to catch issues early.</p>',
                'read_time' => 8,
                'is_published' => true,
                'published_at' => now()->subDays(4),
                'table_of_contents' => [
                    'Automating Compliance Checks',
                    'GitHub Actions Workflow',
                    'Best Practices',
                ],
            ],
            [
                'title' => 'Understanding the EU AI Act: Technical Requirements',
                'slug' => 'understanding-eu-ai-act-technical-requirements',
                'excerpt' => 'Deep dive into the technical requirements of the EU AI Act.',
                'featured_image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=800',
                'content' => '<h2 id="eu-ai-act-overview">EU AI Act Overview</h2>
<p>The EU AI Act introduces risk-based regulations for AI systems.</p>

<h2 id="technical-documentation">Technical Documentation Requirements</h2>
<pre><code class="language-json">{
  "technical_documentation": {
    "system_description": {
      "purpose": "Credit scoring system",
      "risk_level": "high"
    }
  }
}
</code></pre>

<h2 id="requirements-summary">Requirements Summary</h2>
<table>
<thead>
<tr>
<th>Requirement</th>
<th>High Risk</th>
</tr>
</thead>
<tbody>
<tr>
<td>Risk Management</td>
<td>Required</td>
</tr>
<tr>
<td>Data Governance</td>
<td>Required</td>
</tr>
</tbody>
</table>',
                'read_time' => 14,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'table_of_contents' => [
                    'EU AI Act Overview',
                    'Technical Documentation Requirements',
                    'Requirements Summary',
                ],
            ],
        ];

        foreach ($blogs as $blogData) {
            if ($categories->count() > 0) {
                $blogData['blog_category_id'] = $categories->random()->id;
            }
            
            Blog::create($blogData);
        }
    }
}
