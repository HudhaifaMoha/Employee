<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('job_title')
                    ->label('Job Title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('employee_number')
                    ->label('Employee Number')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(50),

                Forms\Components\FileUpload::make('photo')
                    ->label('Photo')
                    ->image()
                    ->disk('public')
                    ->directory('employees')
                    ->imageEditor()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Card')
                    ->label('ID Card')
                    ->url(fn($record) => route('employee.card', $record->slug), true)
                    ->openUrlInNewTab(),

                Tables\Columns\ImageColumn::make('photo')->label('Photo')->disk('public'),
                Tables\Columns\TextColumn::make('name')->label('Name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('job_title')->label('Job Title')->sortable(),
                Tables\Columns\TextColumn::make('employee_number')->label('Employee Number')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('View Card')
                    ->label('بطاقة التعريف')
                    ->icon('heroicon-o-identification')
                    ->url(fn($record) => route('employee.card', $record->slug))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
