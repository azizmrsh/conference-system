<?php

namespace App\Filament\Resources\Papers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class PaperForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Paper Details')
                    ->icon('heroicon-o-document-text')
                    ->columns(2)
                    ->schema([
                        Select::make('invitation_id')
                            ->label('Invitation')
                            ->relationship('invitation', 'id')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('title_ar')->label('Paper Title (AR)')->required(),
                        TextInput::make('title_en')->label('Paper Title (EN)'),
                    ]),

                Section::make('Content')
                    ->icon('heroicon-o-pencil-square')
                    ->schema([
                        Textarea::make('abstract_ar')->label('Abstract (AR)')->columnSpanFull(),
                        Textarea::make('abstract_en')->label('Abstract (EN)')->columnSpanFull(),
                        TextInput::make('theme')->label('Theme'),
                        TextInput::make('keywords')->label('Keywords'),
                        TextInput::make('word_count')->numeric()->minValue(0),
                    ]),

                Section::make('Status & Dates')
                    ->icon('heroicon-o-check-circle')
                    ->columns(2)
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'abstract_pending' => 'ملخص قيد الانتظار',
                                'abstract_accepted' => 'ملخص مقبول',
                                'full_paper_pending' => 'بحث كامل قيد الانتظار',
                                'under_review' => 'قيد المراجعة',
                                'modifications_required' => 'تعديلات مطلوبة',
                                'accepted_final' => 'مقبول نهائي',
                                'sent_to_print' => 'مرسل للطباعة',
                            ])
                            ->required()
                            ->rule(Rule::in(['abstract_pending','abstract_accepted','full_paper_pending','under_review','modifications_required','accepted_final','sent_to_print']))
                            ->columnSpanFull(),
                        DateTimePicker::make('submitted_at')->label('Submitted At'),
                        DateTimePicker::make('accepted_at')->label('Accepted At'),
                        DatePicker::make('review_deadline')->label('Review Deadline'),
                    ]),
            ]);
    }
}

