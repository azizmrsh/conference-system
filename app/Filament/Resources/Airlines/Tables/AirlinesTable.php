<?php

namespace App\Filament\Resources\Airlines\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AirlinesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_ar')->label('Name (AR)')->searchable(),
                TextColumn::make('iata_code')->label('IATA')->sortable(),
                TextColumn::make('contact_phone')->label('Phone'),
                TextColumn::make('contact_email')->label('Email'),
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

