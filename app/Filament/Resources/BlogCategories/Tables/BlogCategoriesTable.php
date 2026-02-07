<?php

namespace App\Filament\Resources\BlogCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BlogCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($record) {
                        return $record->parent_id ? '— ' . $record->name : $record->name;
                    }),
                
                TextColumn::make('parent.name')
                    ->label('Parent Category')
                    ->placeholder('Main Category'),
                
                TextColumn::make('slug')
                    ->searchable()
                    ->copyable(),
                
                TextColumn::make('blogs_count')
                    ->counts('blogs')
                    ->badge(),
                
                TextColumn::make('sort_order')
                    ->sortable(),
                
                ToggleColumn::make('is_active'),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true))
                    ->default(),
                
                Filter::make('main_categories')
                    ->query(fn (Builder $query): Builder => $query->whereNull('parent_id')),
                
                Filter::make('subcategories')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('parent_id')),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('parent_id', 'asc')
            ->defaultSort('sort_order', 'asc');
    }
}
