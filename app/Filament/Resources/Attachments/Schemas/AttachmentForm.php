<?php

namespace App\Filament\Resources\Attachments\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AttachmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Attachment')
                    ->columns(3)
                    ->schema([
                        TextInput::make('attachable_type')->label('Attachable Type')->required(),
                        TextInput::make('attachable_id')->label('Attachable ID')->numeric()->required(),
                        TextInput::make('collection')->label('Collection')->required(),
                        TextInput::make('disk')->label('Disk')->default('s3'),
                        TextInput::make('path')->label('Path')->required(),
                        TextInput::make('filename')->label('Filename'),
                        TextInput::make('mime')->label('MIME'),
                        TextInput::make('size')->label('Size')->numeric()->minValue(0),
                        Select::make('uploaded_by')->label('Uploaded By')->relationship('uploader','name')->searchable()->preload(),
                        Textarea::make('meta')->label('Meta')->columnSpanFull(),
                    ]),
            ]);
    }
}


