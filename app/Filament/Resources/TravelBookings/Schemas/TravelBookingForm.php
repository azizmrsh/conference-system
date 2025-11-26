<?php

namespace App\Filament\Resources\TravelBookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TravelBookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('invitation_id')
                    ->label('Invitation')
                    ->relationship('invitation', 'id')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('type')
                    ->label('Type')
                    ->options([
                        'arrival_flight' => 'رحلة وصول',
                        'departure_flight' => 'رحلة مغادرة',
                        'hotel' => 'فندق',
                        'transfer' => 'نقل',
                    ])
                    ->required(),
                Select::make('airline_id')
                    ->label('Airline')
                    ->relationship('airline', 'name_ar')
                    ->searchable()
                    ->preload()
                    ->visible(fn ($get) => in_array($get('type'), ['arrival_flight','departure_flight'])),
                TextInput::make('flight_number')
                    ->label('Flight Number')
                    ->visible(fn ($get) => in_array($get('type'), ['arrival_flight','departure_flight'])),
                DatePicker::make('flight_date')
                    ->label('Flight Date')
                    ->visible(fn ($get) => in_array($get('type'), ['arrival_flight','departure_flight'])),
                DateTimePicker::make('flight_time')
                    ->label('Flight Time')
                    ->visible(fn ($get) => in_array($get('type'), ['arrival_flight','departure_flight'])),
                Select::make('airport_from_id')
                    ->label('Departure Airport')
                    ->relationship('airportFrom', 'name_ar')
                    ->searchable()
                    ->preload()
                    ->visible(fn ($get) => in_array($get('type'), ['arrival_flight','departure_flight'])),
                Select::make('airport_to_id')
                    ->label('Arrival Airport')
                    ->relationship('airportTo', 'name_ar')
                    ->searchable()
                    ->preload()
                    ->visible(fn ($get) => in_array($get('type'), ['arrival_flight','departure_flight'])),
                TextInput::make('ticket_number')->label('Ticket Number'),
                Select::make('hotel_id')
                    ->label('Hotel')
                    ->relationship('hotel', 'name_ar')
                    ->searchable()
                    ->preload()
                    ->visible(fn ($get) => $get('type') === 'hotel'),
                Select::make('room_type')
                    ->label('Room Type')
                    ->options([
                        'standard' => 'عادية',
                        'suite' => 'سويت',
                        'royal_suite' => 'رويال سويت',
                    ])
                    ->visible(fn ($get) => $get('type') === 'hotel'),
                DatePicker::make('check_in')
                    ->label('Hotel Check-in')
                    ->visible(fn ($get) => $get('type') === 'hotel'),
                DatePicker::make('check_out')
                    ->label('Hotel Check-out')
                    ->visible(fn ($get) => $get('type') === 'hotel'),
                TextInput::make('cost')->label('Cost')->numeric()->minValue(0),
                TextInput::make('ticket_path')->label('Ticket Path'),
                Select::make('delivery_method')
                    ->label('Delivery Method')
                    ->options([
                        'email' => 'بريد إلكتروني',
                        'fax' => 'فاكس',
                        'hand' => 'باليد',
                        'courier' => 'بريد سريع',
                    ]),
                DateTimePicker::make('delivery_confirmed_at')->label('Delivery Confirmed At'),
                Select::make('booking_status')
                    ->label('Booking Status')
                    ->options([
                        'pending' => 'معلق',
                        'booked' => 'محجوز',
                        'issued' => 'مُصدر',
                        'cancelled' => 'ملغي',
                    ])
                    ->required(),
            ]);
    }
}

