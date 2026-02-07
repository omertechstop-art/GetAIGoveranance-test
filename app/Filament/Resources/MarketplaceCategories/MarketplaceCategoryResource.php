<?php

namespace App\Filament\Resources\MarketplaceCategories;

use App\Enums\NavigationIcon;
use App\Filament\Resources\MarketplaceCategories\Pages\CreateMarketplaceCategory;
use App\Filament\Resources\MarketplaceCategories\Pages\EditMarketplaceCategory;
use App\Filament\Resources\MarketplaceCategories\Pages\ListMarketplaceCategories;
use App\Filament\Resources\MarketplaceCategories\Schemas\MarketplaceCategoryForm;
use App\Filament\Resources\MarketplaceCategories\Tables\MarketplaceCategoriesTable;
use App\Models\MarketplaceCategory;
use App\Models\Vendor;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class MarketplaceCategoryResource extends Resource
{
    protected static ?string $model = MarketplaceCategory::class;

    protected static string|BackedEnum|null $navigationIcon = NavigationIcon::MarketplaceCategory;

    protected static string|UnitEnum|null $navigationGroup = 'Marketplace';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationBadge(): ?string
    {
        $count = 0;
        foreach (static::getModel()::all() as $category) {
            $count += Vendor::whereJsonContains('marketplace_categories', $category->id)->count();
        }
        return $count > 0 ? (string) $count : null;
    }

    public static function form(Schema $schema): Schema
    {
        return MarketplaceCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketplaceCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMarketplaceCategories::route('/'),
            'create' => CreateMarketplaceCategory::route('/create'),
            'edit' => EditMarketplaceCategory::route('/{record}/edit'),
        ];
    }
}
