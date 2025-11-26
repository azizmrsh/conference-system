<?php

namespace App\Filament\Resources\Invitations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;

class InvitationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('conference.title_ar')->label('Conference')->searchable(),
                TextColumn::make('member.first_name_ar')->label('Member')->searchable(),
                BadgeColumn::make('role')->label('Role'),
                BadgeColumn::make('status')->label('Status'),
                IconColumn::make('needs_visa')->boolean()->label('Visa'),
                IconColumn::make('flight_booked')->boolean()->label('Flight'),
                IconColumn::make('hotel_booked')->boolean()->label('Hotel'),
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
