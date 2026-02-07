<?php

namespace App\Filament\Resources\QAS\Pages;

use App\Filament\Resources\QAS\QAResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewQA extends ViewRecord
{
    protected static string $resource = QAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
