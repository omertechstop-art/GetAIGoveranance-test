<?php

namespace App\Filament\Resources\QAS\Pages;

use App\Filament\Resources\QAS\QAResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQAS extends ListRecords
{
    protected static string $resource = QAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
