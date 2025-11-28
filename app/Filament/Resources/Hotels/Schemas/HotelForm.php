<?php

namespace App\Filament\Resources\Hotels\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HotelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hotel')
                    ->icon('heroicon-o-building-office')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name_ar')->label('Name (AR)')->required(),
                        TextInput::make('name_en')->label('Name (EN)'),
                        TextInput::make('address_ar')->label('Address (AR)'),
                        TextInput::make('address_en')->label('Address (EN)'),
                        TextInput::make('contact_person')->label('Contact Person'),
                        TextInput::make('phone')->label('Phone'),
                        TextInput::make('email')->label('Email')->email(),
                        TextInput::make('rating')->numeric()->minValue(0)->maxValue(5)->label('Rating'),
                        Textarea::make('notes')->label('Notes')->columnSpanFull(),
                        Select::make('created_by')
                            ->label('Created By')
                            ->relationship('creator', 'name')
                            ->searchable()
                            ->preload(),
                    ]),
            ]);
    }
}


