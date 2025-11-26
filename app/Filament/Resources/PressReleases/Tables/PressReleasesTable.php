<?php

namespace App\Filament\Resources\PressReleases\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PressReleasesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title_ar')->label('Title')->searchable(),
                TextColumn::make('mediaCampaign.title_ar')->label('Campaign'),
                BadgeColumn::make('release_type')->label('Type'),
                BadgeColumn::make('status')->label('Status'),
                TextColumn::make('scheduled_release_time')->dateTime()->label('Scheduled'),
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

