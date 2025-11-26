<?php

namespace App\Filament\Resources\BadgesKits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BadgesKitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('conference.title_ar')->label('Conference'),
                BadgeColumn::make('item_type')->label('Type'),
                TextColumn::make('quantity')->label('Quantity')->sortable(),
                TextColumn::make('cost_per_item')->label('Cost/Item')->sortable(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

