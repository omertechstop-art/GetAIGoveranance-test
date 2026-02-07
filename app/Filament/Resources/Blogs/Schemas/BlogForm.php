<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Models\BlogCategory;
use App\Models\MarketplaceCategory;
use App\Models\Vendor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
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
                
                TextInput::make('author_name')
                    ->label('Author Name')
                    ->maxLength(255),
                
                FileUpload::make('author_image')
                    ->label('Author Image')
                    ->image()
                    ->disk('s3')
                    ->directory('author-images')
                    ->preserveFilenames(false),
                
                Textarea::make('excerpt')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),
                
                RichEditor::make('content')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'h2',
                        'h3',
                        'bulletList',
                        'orderedList',
                        'blockquote',
                        'codeBlock',
                    ])
                    ->columnSpanFull()
                    ->helperText('Bold text in paragraphs becomes H2 headings. To add images: paste <img src="https://image-url.com/image.jpg" alt="description"> where you want it.'),
                
                RichEditor::make('our_take')
                    ->label('Our Take (Optional)')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'link',
                        'bulletList',
                        'orderedList',
                    ])
                    ->columnSpanFull(),
                
                FileUpload::make('featured_image')
                    ->image()
                    ->disk('s3')
                    ->directory('blog-images')
                    ->preserveFilenames(false),
                
                Select::make('blog_category_id')
                    ->label('Category')
                    ->options(BlogCategory::where('is_active', true)->pluck('name', 'id'))
                    ->required(),
                
                TextInput::make('read_time')
                    ->label('Read Time (minutes)')
                    ->numeric()
                    ->suffix('min'),
                
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
                
                Toggle::make('has_our_take')
                    ->label('Include Our Take')
                    ->live(),
                
                DateTimePicker::make('published_at')
                    ->visible(fn ($get) => $get('is_published')),
            ]);
    }
}
