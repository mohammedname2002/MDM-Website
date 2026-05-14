<?php

namespace App\Filament\Admin\Resources\AboutPageResource\Pages;

use App\Filament\Admin\Resources\AboutPageResource;
use Filament\Resources\Pages\ListRecords;

class ListAboutPages extends ListRecords
{
    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
