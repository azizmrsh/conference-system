<?php

namespace App\Filament\Resources\Attachments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttachmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('attachable_type')->label('Type'),
                TextColumn::make('attachable_id')->label('ID'),
                TextColumn::make('collection')->label('Collection'),
                TextColumn::make('filename')->label('Filename')->searchable(),
                TextColumn::make('mime')->label('MIME'),
                TextColumn::make('size')->label('Size'),
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

