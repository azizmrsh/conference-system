<?php

namespace App\Filament\Resources\Sessions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class ConferenceSessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Session Info')
                    ->icon('heroicon-o-presentation-chart-line')
                    ->columns(2)
                    ->schema([
                        Select::make('conference_id')
                            ->label('Conference')
                            ->relationship('conference', 'title_ar')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('title_ar')->label('Session Title (AR)')->required(),
                        TextInput::make('title_en')->label('Session Title (EN)'),
                        TextInput::make('theme_ar')->label('Theme (AR)'),
                        TextInput::make('theme_en')->label('Theme (EN)'),
                    ]),

                Section::make('Schedule & Venue')
                    ->icon('heroicon-o-clock')
                    ->columns(3)
                    ->schema([
                        DatePicker::make('date')->label('Date')->required(),
                        TextInput::make('start_time')->label('Start Time')->required()->rule('date_format:H:i:s'),
                        TextInput::make('end_time')->label('End Time')->required()->rule('date_format:H:i:s'),
                        TextInput::make('hall_name_ar')->label('Hall (AR)'),
                        TextInput::make('hall_name_en')->label('Hall (EN)'),
                    ]),

                Section::make('Management')
                    ->icon('heroicon-o-users')
                    ->columns(2)
                    ->schema([
                        Select::make('chair_member_id')
                            ->label('Session Chair')
                            ->relationship('chair', 'first_name_ar')
                            ->searchable()
                            ->preload(),
                        TextInput::make('order_number')->numeric()->minValue(1)->label('Order'),
                    ]),
            ]);
    }
}

