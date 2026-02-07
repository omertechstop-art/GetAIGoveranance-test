<?php

namespace App\Filament\Resources\QAS;

use App\Enums\NavigationIcon;
use App\Filament\Resources\QAS\Pages\CreateQA;
use App\Filament\Resources\QAS\Pages\EditQA;
use App\Filament\Resources\QAS\Pages\ListQAS;
use App\Filament\Resources\QAS\Pages\ViewQA;
use App\Filament\Resources\QAS\Schemas\QAForm;
use App\Filament\Resources\QAS\Tables\QASTable;
use App\Models\QA;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class QAResource extends Resource
{
    protected static ?string $model = QA::class;

    protected static string|BackedEnum|null $navigationIcon = NavigationIcon::QA;

    protected static string|UnitEnum|null $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'question';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_published', true)->count();
    }

    public static function form(Schema $schema): Schema
    {
        return QAForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QASTable::configure($table);
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
            'index' => ListQAS::route('/'),
            'create' => CreateQA::route('/create'),
            'view' => ViewQA::route('/{record}'),
            'edit' => EditQA::route('/{record}/edit'),
        ];
    }
}
