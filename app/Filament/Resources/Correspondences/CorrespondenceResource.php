<?php

namespace App\Filament\Resources\Correspondences;

use App\Filament\Resources\Correspondences\Pages\CreateCorrespondence;
use App\Filament\Resources\Correspondences\Pages\EditCorrespondence;
use App\Filament\Resources\Correspondences\Pages\ListCorrespondences;
use App\Filament\Resources\Correspondences\Schemas\CorrespondenceForm;
use App\Filament\Resources\Correspondences\Tables\CorrespondencesTable;
use App\Models\Correspondence;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CorrespondenceResource extends Resource
{
    protected static ?string $model = Correspondence::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Inbox;

    protected static ?string $recordTitleAttribute = 'ref_number';

    protected static string|UnitEnum|null $navigationGroup = 'Pre-Conference';

    protected static ?int $navigationSort = 120;

    public static function form(Schema $schema): Schema
    {
        return CorrespondenceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CorrespondencesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCorrespondences::route('/'),
            'create' => CreateCorrespondence::route('/create'),
            'edit' => EditCorrespondence::route('/{record}/edit'),
        ];
    }
}
