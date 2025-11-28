<?php

namespace App\Filament\Resources\TravelBookings;

use App\Filament\Resources\TravelBookings\Pages\CreateTravelBooking;
use App\Filament\Resources\TravelBookings\Pages\EditTravelBooking;
use App\Filament\Resources\TravelBookings\Pages\ListTravelBookings;
use App\Filament\Resources\TravelBookings\Schemas\TravelBookingForm;
use App\Filament\Resources\TravelBookings\Tables\TravelBookingsTable;
use App\Models\TravelBooking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TravelBookingResource extends Resource
{
    protected static ?string $model = TravelBooking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Ticket;

    protected static ?string $recordTitleAttribute = 'id';

    protected static string|UnitEnum|null $navigationGroup = 'Logistics';

    protected static ?int $navigationSort = 310;

    public static function form(Schema $schema): Schema
    {
        return TravelBookingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TravelBookingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTravelBookings::route('/'),
            'create' => CreateTravelBooking::route('/create'),
            'edit' => EditTravelBooking::route('/{record}/edit'),
        ];
    }
}
