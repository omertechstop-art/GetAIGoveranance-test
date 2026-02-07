<?php

namespace App\Filament\Resources\MarketplaceCategories\Schemas;

use App\Models\MarketplaceCategory;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MarketplaceCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('parent_id')
                    ->label('Parent Category')
                    ->options(MarketplaceCategory::whereNull('parent_id')->pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('Select parent category (optional)'),
                
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->rules(['alpha_dash']),
                
                Textarea::make('description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                
                RichEditor::make('detailed_description')
                    ->columnSpanFull(),
                
                TextInput::make('icon')
                    ->label('Icon (Heroicon name)')
                    ->placeholder('heroicon-o-shield-check'),
                
                ColorPicker::make('color')
                    ->default('#3B82F6'),
                
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                
                Toggle::make('is_active')
                    ->default(true),
                
                Toggle::make('is_featured')
                    ->default(false),
                
                TextInput::make('meta_title')
                    ->maxLength(255),
                
                Textarea::make('meta_description')
                    ->rows(3),
            ]);
    }
}
