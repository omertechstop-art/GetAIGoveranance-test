<?php

namespace App\Enums;

enum NavigationIcon: string
{
    case Blog = 'heroicon-o-document-text';
    case BlogCategory = 'heroicon-o-tag';
    case Vendor = 'heroicon-o-building-office';
    case MarketplaceCategory = 'heroicon-o-squares-2x2';
    case QA = 'heroicon-o-question-mark-circle';
    case Analytics = 'heroicon-o-chart-bar';
}