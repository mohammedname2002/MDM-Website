<?php

namespace App\Filament\Admin\Resources\HomePageResource\Pages;

use App\Filament\Admin\Resources\HomePageResource;
use Filament\Resources\Pages\ListRecords;

class ListHomePages extends ListRecords
{
    protected static string $resource = HomePageResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
