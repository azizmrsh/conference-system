<?php

namespace App\Filament\Resources\Committees\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CommitteeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Committee')
                    ->columns(2)
                    ->schema([
                        Select::make('conference_id')->label('Conference')->relationship('conference','title_ar')->searchable()->preload()->required(),
                        TextInput::make('name_ar')->label('Name (AR)')->required(),
                        TextInput::make('name_en')->label('Name (EN)'),
                        Textarea::make('description_ar')->label('Description (AR)')->columnSpanFull(),
                        Textarea::make('description_en')->label('Description (EN)')->columnSpanFull(),
                        Select::make('created_by')->label('Created By')->relationship('creator','name')->searchable()->preload(),
                    ]),
            ]);
    }
}


