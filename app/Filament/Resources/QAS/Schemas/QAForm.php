<?php

namespace App\Filament\Resources\QAS\Schemas;

use App\Models\MarketplaceCategory;
use App\Models\Vendor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class QAForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                    ->columnSpanFull(),
                
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->rules(['alpha_dash'])
                    ->columnSpanFull(),
                
                RichEditor::make('answer')
                    ->required()
                    ->columnSpanFull(),
                
                Select::make('vendor_tags')
                    ->label('Tagged Vendors')
                    ->multiple()
                    ->options(Vendor::where('is_active', true)->pluck('name', 'id'))
                    ->searchable(),
                
                Select::make('marketplace_category_tags')
                    ->label('Tagged Categories')
                    ->multiple()
                    ->options(MarketplaceCategory::where('is_active', true)->pluck('name', 'id'))
                    ->searchable(),
                
                TextInput::make('meta_title')
                    ->maxLength(255),
                
                Textarea::make('meta_description')
                    ->rows(3),
                
                Toggle::make('is_published')
                    ->live(),
                
                Toggle::make('is_featured'),
                
                DateTimePicker::make('published_at')
                    ->visible(fn ($get) => $get('is_published')),
            ]);
    }
}
