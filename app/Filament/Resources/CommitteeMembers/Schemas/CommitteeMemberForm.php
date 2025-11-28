<?php

namespace App\Filament\Resources\CommitteeMembers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CommitteeMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Assignment Details')
                    ->icon('heroicon-o-briefcase')
                    ->columns(2)
                    ->schema([
                        Select::make('committee_id')
                            ->label('Committee')
                            ->relationship('committee', 'name_ar')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('member_id')
                            ->label('Member')
                            ->relationship('member', 'first_name_ar')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('role')
                            ->label('Role')
                            ->default('member')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
