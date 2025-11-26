<?php

namespace App\Filament\Resources\TravelBookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class TravelBookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invitation.id')->label('Invitation')->sortable(),
                BadgeColumn::make('type')->label('Type'),
                TextColumn::make('flight_date')->date()->label('Date/Check-in'),
                IconColumn::make('booking_status')
                    ->boolean()
                    ->label('Booked')
                    ->trueIcon('heroicon-o-check')
                    ->falseIcon('heroicon-o-minus'),
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
