<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name_ar')->label('First Name (AR)')->required(),
                TextInput::make('last_name_ar')->label('Last Name (AR)')->required(),
                TextInput::make('first_name_en')->label('First Name (EN)'),
                TextInput::make('last_name_en')->label('Last Name (EN)'),
                TextInput::make('honorific_title_ar')->label('Honorific Title (AR)'),
                TextInput::make('academic_title_ar')->label('Academic Title (AR)'),
                Select::make('type')
                    ->label('Type')
                    ->options([
                        'working_member' => 'عضو عامل',
                        'correspondent_member' => 'عضو مراسل',
                        'honorary_member' => 'عضو شرف',
                        'guest_speaker' => 'ضيف متحدث',
                        'staff' => 'موظف',
                        'journalist' => 'صحفي',
                    ])
                    ->required()
                    ->rule(Rule::in(['working_member','correspondent_member','honorary_member','guest_speaker','staff','journalist'])),
                DatePicker::make('membership_date')->label('Membership Date'),
                Select::make('nationality_id')
                    ->label('Nationality')
                    ->relationship('nationality', 'name_ar')
                    ->searchable()
                    ->preload(),
                TextInput::make('passport_number')->label('Passport Number'),
                DatePicker::make('passport_expiry')->label('Passport Expiry'),
                TextInput::make('email')->email(),
                TextInput::make('phone'),
                Textarea::make('cv_text')->label('CV')->columnSpanFull(),
                TextInput::make('photo_path')->label('Photo Path'),
                Toggle::make('is_active')->label('Active')->default(true),
            ]);
    }
}

