<?php

namespace App\Filament\Resources\Sessions\Tables;

use Filament\Actions\BulkActionGroup;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class ConferenceSessionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('conference.title_ar')->label('Conference'),
                TextColumn::make('title_ar')->label('Session')->searchable(),
                TextColumn::make('date')->date()->label('Date')->sortable(),
                BadgeColumn::make('hall_name_ar')->label('Hall'),
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
