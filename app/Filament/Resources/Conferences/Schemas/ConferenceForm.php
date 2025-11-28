<?php

namespace App\Filament\Resources\Conferences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
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
                Section::make('General Information')
                    ->icon('heroicon-o-information-circle')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title_ar')->label('Title (AR)')->required(),
                        TextInput::make('title_en')->label('Title (EN)'),
                        TextInput::make('session_number')->numeric()->minValue(1),
                        TextInput::make('hijri_year')->label('Hijri Year'),
                        TextInput::make('gregorian_year')->numeric()->minValue(1900)->maxValue(2100),
                        TextInput::make('logo_path')->label('Logo Path'),
                    ]),

                Section::make('Schedule')
                    ->icon('heroicon-o-calendar')
                    ->columns(2)
                    ->schema([
                        DatePicker::make('start_date')->label('Start Date')->required(),
                        DatePicker::make('end_date')->label('End Date')->required()->minDate(fn ($get) => $get('start_date')),
                    ]),

                Section::make('Venue')
                    ->icon('heroicon-o-map-pin')
                    ->columns(2)
                    ->schema([
                        TextInput::make('venue_name_ar')->label('Venue Name (AR)'),
                        TextInput::make('venue_name_en')->label('Venue Name (EN)'),
                        TextInput::make('venue_address_ar')->label('Venue Address (AR)'),
                        TextInput::make('venue_address_en')->label('Venue Address (EN)'),
                    ]),

                Section::make('Content')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Textarea::make('themes')->columnSpanFull(),
                        Textarea::make('description_ar')->label('Description (AR)')->columnSpanFull(),
                        Textarea::make('description_en')->label('Description (EN)')->columnSpanFull(),
                    ]),

                Section::make('Status')
                    ->icon('heroicon-o-flag')
                    ->schema([
                        TextInput::make('status')
                            ->label('Status')
                            ->required()
                            ->rule(Rule::in(['planning', 'active', 'completed', 'archived'])),
                    ]),
            ]);
    }
}
