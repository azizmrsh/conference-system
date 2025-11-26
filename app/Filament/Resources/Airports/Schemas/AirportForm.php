<?php

namespace App\Filament\Resources\Airports\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AirportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Airport')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name_ar')->label('Name (AR)')->required(),
                        TextInput::make('name_en')->label('Name (EN)'),
                        TextInput::make('iata_code')->label('IATA Code')->maxLength(3)->required(),
                        TextInput::make('city_ar')->label('City (AR)')->required(),
                        TextInput::make('city_en')->label('City (EN)'),
                        Select::make('country_id')
                            ->label('Country')
                            ->relationship('country', 'name_ar')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('created_by')
                            ->label('Created By')
                            ->relationship('creator', 'name')
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }
}


