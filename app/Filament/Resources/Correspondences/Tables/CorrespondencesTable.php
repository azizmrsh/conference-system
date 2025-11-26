<?php

namespace App\Filament\Resources\Correspondences\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CorrespondencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ref_number')->label('Ref No.')->searchable(),
                TextColumn::make('conference.title_ar')->label('Conference'),
                BadgeColumn::make('category')->label('Category'),
                BadgeColumn::make('status')->label('Status'),
                TextColumn::make('correspondence_date')->date()->label('Date')->sortable(),
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

