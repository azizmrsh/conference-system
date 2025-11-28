<?php

namespace App\Filament\Resources\BadgesKits;

use App\Filament\Resources\BadgesKits\Pages\CreateBadgesKit;
use App\Filament\Resources\BadgesKits\Pages\EditBadgesKit;
use App\Filament\Resources\BadgesKits\Pages\ListBadgesKits;
use App\Filament\Resources\BadgesKits\Schemas\BadgesKitForm;
use App\Filament\Resources\BadgesKits\Tables\BadgesKitsTable;
use App\Models\BadgesKit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BadgesKitResource extends Resource
{
    protected static ?string $model = BadgesKit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Identification;

    protected static ?string $recordTitleAttribute = 'item_type';

    protected static string|UnitEnum|null $navigationGroup = 'Media & Archiving';

    protected static ?int $navigationSort = 530;

    public static function form(Schema $schema): Schema
    {
        return BadgesKitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BadgesKitsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBadgesKits::route('/'),
            'create' => CreateBadgesKit::route('/create'),
            'edit' => EditBadgesKit::route('/{record}/edit'),
        ];
    }
}
