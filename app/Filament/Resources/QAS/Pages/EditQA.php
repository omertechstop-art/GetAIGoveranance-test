<?php

namespace App\Filament\Resources\QAS\Pages;

use App\Filament\Resources\QAS\QAResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQA extends EditRecord
{
    protected static string $resource = QAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
