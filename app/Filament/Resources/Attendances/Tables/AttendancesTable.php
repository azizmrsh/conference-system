<?php

namespace App\Filament\Resources\Attendances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class AttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('conference.title_ar')->label('Conference'),
                TextColumn::make('session.title_ar')->label('Session'),
                TextColumn::make('member.first_name_ar')->label('Member'),
                TextColumn::make('check_in_at')->dateTime()->label('Check-in'),
                TextColumn::make('check_out_at')->dateTime()->label('Check-out'),
                BadgeColumn::make('method')->label('Method'),
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
