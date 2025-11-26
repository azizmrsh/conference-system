<?php

namespace App\Filament\Resources\Countries\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CountryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Names')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name_ar')->label('Name (AR)')->required(),
                        TextInput::make('name_en')->label('Name (EN)'),
                    ]),
                Section::make('Details')
                    ->columns(3)
                    ->schema([
                        TextInput::make('iso_code')->label('ISO Code')->maxLength(3),
                        Toggle::make('visa_required_for_jordan')->label('Visa Required for Jordan')->default(true),
                        Select::make('created_by')
                            ->label('Created By')
                            ->relationship('creator', 'name')
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }
}


