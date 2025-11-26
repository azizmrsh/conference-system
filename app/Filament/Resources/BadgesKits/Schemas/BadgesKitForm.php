<?php

namespace App\Filament\Resources\BadgesKits\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BadgesKitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Badge/Kit')
                    ->columns(3)
                    ->schema([
                        Select::make('conference_id')->label('Conference')->relationship('conference','title_ar')->searchable()->preload()->required(),
                        Select::make('item_type')->label('Item Type')->options([
                            'staff_badge'=>'Staff Badge','member_badge'=>'Member Badge','guest_badge'=>'Guest Badge','press_badge'=>'Press Badge','bag'=>'Bag','dvd'=>'DVD'
                        ])->required(),
                        Textarea::make('description')->label('Description')->columnSpanFull(),
                        TextInput::make('quantity')->label('Quantity')->numeric()->minValue(0)->required(),
                        TextInput::make('cost_per_item')->label('Cost/Item')->numeric()->minValue(0),
                    ]),
            ]);
    }
}


