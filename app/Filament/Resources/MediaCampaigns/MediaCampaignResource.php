<?php

namespace App\Filament\Resources\MediaCampaigns;

use App\Filament\Resources\MediaCampaigns\Pages\CreateMediaCampaign;
use App\Filament\Resources\MediaCampaigns\Pages\EditMediaCampaign;
use App\Filament\Resources\MediaCampaigns\Pages\ListMediaCampaigns;
use App\Filament\Resources\MediaCampaigns\Schemas\MediaCampaignForm;
use App\Filament\Resources\MediaCampaigns\Tables\MediaCampaignsTable;
use App\Models\MediaCampaign;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MediaCampaignResource extends Resource
{
    protected static ?string $model = MediaCampaign::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Megaphone;

    protected static ?string $recordTitleAttribute = 'title_ar';

    protected static string|UnitEnum|null $navigationGroup = 'Media & Archiving';

    protected static ?int $navigationSort = 510;

    public static function form(Schema $schema): Schema
    {
        return MediaCampaignForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MediaCampaignsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMediaCampaigns::route('/'),
            'create' => CreateMediaCampaign::route('/create'),
            'edit' => EditMediaCampaign::route('/{record}/edit'),
        ];
    }
}
