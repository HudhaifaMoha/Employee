<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Action::make('View Card')
                ->label('عرض البطاقة')
                ->url(fn() => route('employee.card', $this->record->slug))
                ->icon('heroicon-o-identification')
                ->openUrlInNewTab(),
        ];
    }
}
