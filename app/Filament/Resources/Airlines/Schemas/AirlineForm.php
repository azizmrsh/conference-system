<?php

namespace App\Filament\Resources\Airlines\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AirlineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Airline')
                    ->icon('heroicon-o-paper-airplane')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name_ar')->label('Name (AR)')->required(),
                        TextInput::make('name_en')->label('Name (EN)'),
                        TextInput::make('iata_code')->label('IATA Code')->maxLength(3),
                        TextInput::make('contact_phone')->label('Contact Phone'),
                        TextInput::make('contact_email')->label('Contact Email')->email(),
                        Select::make('created_by')
                            ->label('Created By')
                            ->relationship('creator', 'name')
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }
}


