<?php

namespace App\Filament\Resources\Conferences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class ConferenceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title_ar')
                    ->label('Title (AR)')
                    ->required(),
                TextInput::make('title_en')
                    ->label('Title (EN)'),
                TextInput::make('session_number')
                    ->numeric()
                    ->minValue(1),
                TextInput::make('hijri_year')
                    ->label('Hijri Year'),
                TextInput::make('gregorian_year')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(2100),
                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),
                DatePicker::make('end_date')
                    ->label('End Date')
                    ->required()
                    ->rule(fn ($get) => Rule::when($get('start_date'), [
                        'after_or_equal:'.$get('start_date'),
                    ])),
                TextInput::make('venue_name_ar')->label('Venue Name (AR)'),
                TextInput::make('venue_name_en')->label('Venue Name (EN)'),
                TextInput::make('venue_address_ar')->label('Venue Address (AR)'),
                TextInput::make('venue_address_en')->label('Venue Address (EN)'),
                Textarea::make('themes')->columnSpanFull(),
                Textarea::make('description_ar')->label('Description (AR)')->columnSpanFull(),
                Textarea::make('description_en')->label('Description (EN)')->columnSpanFull(),
                TextInput::make('status')
                    ->label('Status')
                    ->required()
                    ->rule(Rule::in(['planning','active','completed','archived'])),
                TextInput::make('logo_path')->label('Logo Path'),
            ]);
    }
}

