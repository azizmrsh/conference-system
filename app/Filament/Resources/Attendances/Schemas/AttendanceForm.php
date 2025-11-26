<?php

namespace App\Filament\Resources\Attendances\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('conference_id')
                    ->label('Conference')
                    ->relationship('conference', 'title_ar')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('conference_session_id')
                    ->label('Session')
                    ->relationship('session', 'title_ar')
                    ->searchable()
                    ->preload(),
                Select::make('invitation_id')
                    ->label('Invitation')
                    ->relationship('invitation', 'id')
                    ->searchable()
                    ->preload(),
                Select::make('member_id')
                    ->label('Member')
                    ->relationship('member', 'first_name_ar')
                    ->searchable()
                    ->preload(),
                TextInput::make('badge_code')->label('Badge Code'),
                Select::make('method')
                    ->label('Registration Method')
                    ->options([
                        'scan' => 'Scan',
                        'manual' => 'Manual',
                    ])
                    ->default('scan')
                    ->rule(Rule::in(['scan','manual'])),
                DateTimePicker::make('check_in_at')->label('Check-in Time'),
                DateTimePicker::make('check_out_at')->label('Check-out Time'),
                Textarea::make('notes')->label('Notes'),
            ]);
    }
}

