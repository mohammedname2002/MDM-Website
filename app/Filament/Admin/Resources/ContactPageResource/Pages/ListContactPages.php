<?php

namespace App\Filament\Admin\Resources\ContactPageResource\Pages;

use App\Filament\Admin\Resources\ContactPageResource;
use Filament\Resources\Pages\ListRecords;

class ListContactPages extends ListRecords
{
    protected static string $resource = ContactPageResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
