<?php

namespace App\Filament\Resources\Vendors\Schemas;

use App\Models\MarketplaceCategory;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class VendorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                
                TextInput::make('website_url')
                    ->required()
                    ->url()
                    ->columnSpanFull(),
                
                Textarea::make('short_description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                
                FileUpload::make('logo')
                    ->image()
                    ->disk('s3')
                    ->directory('vendor-logos')
                    ->preserveFilenames(false),
                
                Select::make('marketplace_categories')
                    ->label('Categories')
                    ->multiple()
                    ->required()
                    ->options(MarketplaceCategory::where('is_active', true)->pluck('name', 'id'))
                    ->searchable(),
                
                Select::make('company_size')
                    ->options([
                        'startup' => 'Startup',
                        'small' => 'Small',
                        'medium' => 'Medium',
                        'enterprise' => 'Enterprise',
                    ]),
                
                Select::make('pricing_model')
                    ->options([
                        'free' => 'Free',
                        'freemium' => 'Freemium',
                        'paid' => 'Paid',
                        'enterprise' => 'Enterprise',
                    ]),
                
                Textarea::make('key_features')
                    ->rows(3),
                
                Textarea::make('use_cases')
                    ->rows(3),
                
                Textarea::make('target_audience')
                    ->rows(3),
                
                TextInput::make('meta_title')
                    ->maxLength(255),
                
                Textarea::make('meta_description')
                    ->rows(3),
                
                Toggle::make('is_featured')
                    ->default(false),
                
                Toggle::make('is_active')
                    ->default(true),
                
                DateTimePicker::make('verified_at')
                    ->label('Verification Date'),
            ]);
    }
}
