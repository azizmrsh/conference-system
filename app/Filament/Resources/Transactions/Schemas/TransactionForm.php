<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Transaction')
                    ->columns(3)
                    ->schema([
                        Select::make('conference_id')->label('Conference')->relationship('conference','title_ar')->searchable()->preload()->required(),
                        Select::make('tx_type')->label('Type')->options(['budget_item'=>'Budget Item','expense'=>'Expense','payment'=>'Payment'])->required(),
                        TextInput::make('category')->label('Category'),
                        TextInput::make('item_name')->label('Item Name')->required(),
                        TextInput::make('estimated_amount')->label('Estimated')->numeric()->minValue(0),
                        TextInput::make('actual_amount')->label('Actual')->numeric()->minValue(0),
                        DatePicker::make('incurred_at')->label('Date'),
                        Select::make('status')->label('Status')->options(['pending'=>'Pending','paid'=>'Paid','cancelled'=>'Cancelled'])->required(),
                        Textarea::make('notes')->label('Notes')->columnSpanFull(),
                        Select::make('created_by')->label('Created By')->relationship('creator','name')->searchable()->preload(),
                    ]),
            ]);
    }
}


