<?php

namespace App\Filament\Resources\PressReleases\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PressReleaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Press Release')
                    ->columns(2)
                    ->schema([
                        Select::make('media_campaign_id')->label('Media Campaign')->relationship('mediaCampaign','title_ar')->searchable()->preload()->required(),
                        TextInput::make('title_ar')->label('Title (AR)')->required(),
                        TextInput::make('title_en')->label('Title (EN)'),
                        Textarea::make('content_ar')->label('Content (AR)')->columnSpanFull()->required(),
                        Textarea::make('content_en')->label('Content (EN)')->columnSpanFull(),
                        Select::make('release_type')->label('Release Type')->options([
                            'announcement'=>'Announcement','invitation'=>'Invitation','daily_coverage'=>'Daily Coverage','final_statement'=>'Final Statement','follow_up'=>'Follow Up'
                        ])->required(),
                        DateTimePicker::make('scheduled_release_time')->label('Scheduled'),
                        DateTimePicker::make('actual_release_time')->label('Actual'),
                        Select::make('status')->label('Status')->options(['draft'=>'Draft','approved'=>'Approved','sent'=>'Sent','published'=>'Published'])->required(),
                        Select::make('created_by')->label('Created By')->relationship('creator','name')->searchable()->preload(),
                    ]),
            ]);
    }
}


