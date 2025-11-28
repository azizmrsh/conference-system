<?php

namespace App\Filament\Resources\Sessions;

use App\Filament\Resources\Sessions\Pages\CreateConferenceSession;
use App\Filament\Resources\Sessions\Pages\EditConferenceSession;
use App\Filament\Resources\Sessions\Pages\ListConferenceSessions;
use App\Filament\Resources\Sessions\Schemas\ConferenceSessionForm;
use App\Filament\Resources\Sessions\Tables\ConferenceSessionsTable;
use App\Models\ConferenceSession;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ConferenceSessionResource extends Resource
{
    protected static ?string $model = ConferenceSession::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Calendar;

    protected static ?string $recordTitleAttribute = 'title_ar';

    protected static string|UnitEnum|null $navigationGroup = 'Scientific Committee';

    protected static ?int $navigationSort = 240;

    public static function form(Schema $schema): Schema
    {
        return ConferenceSessionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConferenceSessionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConferenceSessions::route('/'),
            'create' => CreateConferenceSession::route('/create'),
            'edit' => EditConferenceSession::route('/{record}/edit'),
        ];
    }
}
