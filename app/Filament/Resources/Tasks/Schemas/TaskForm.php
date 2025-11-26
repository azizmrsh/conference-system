<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Task')
                    ->columns(2)
                    ->schema([
                        Select::make('conference_id')->label('Conference')->relationship('conference','title_ar')->searchable()->preload(),
                        Select::make('category')->label('Category')->options([
                            'pre_conference'=>'Pre Conference',
                            'invitation_management'=>'Invitation Management',
                            'paper_management'=>'Paper Management',
                            'logistics'=>'Logistics',
                            'protocol'=>'Protocol',
                            'media_campaign'=>'Media Campaign',
                            'financial'=>'Financial',
                            'during_conference'=>'During Conference',
                            'post_conference'=>'Post Conference',
                        ])->required(),
                        TextInput::make('title_ar')->label('Title (AR)')->required(),
                        TextInput::make('title_en')->label('Title (EN)'),
                        Textarea::make('description_ar')->label('Description (AR)')->columnSpanFull(),
                        Textarea::make('description_en')->label('Description (EN)')->columnSpanFull(),
                        Select::make('assigned_to')->label('Assigned To')->relationship('assignee','name')->searchable()->preload(),
                        TextInput::make('department_responsible')->label('Department'),
                        DatePicker::make('start_date')->label('Start Date'),
                        DatePicker::make('due_date')->label('Due Date'),
                        TextInput::make('priority')->numeric()->minValue(1)->maxValue(5)->label('Priority'),
                        TextInput::make('estimated_hours')->numeric()->minValue(0)->label('Estimated Hours'),
                        Select::make('status')->label('Status')->options([
                            'not_started'=>'Not Started','in_progress'=>'In Progress','waiting'=>'Waiting','completed'=>'Completed','overdue'=>'Overdue','cancelled'=>'Cancelled'
                        ])->required(),
                        TextInput::make('completion_percentage')->numeric()->minValue(0)->maxValue(100)->label('Completion %'),
                        Textarea::make('prerequisites')->label('Prerequisites')->columnSpanFull(),
                        Textarea::make('deliverables')->label('Deliverables')->columnSpanFull(),
                        Textarea::make('success_criteria')->label('Success Criteria')->columnSpanFull(),
                        Toggle::make('auto_reminder')->label('Auto Reminder')->default(true),
                        TextInput::make('reminder_schedule')->label('Reminder Schedule'),
                        Textarea::make('notes')->label('Notes')->columnSpanFull(),
                        Select::make('created_by')->label('Created By')->relationship('creator','name')->searchable()->preload(),
                    ]),
            ]);
    }
}


