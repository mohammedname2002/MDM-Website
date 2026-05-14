<?php

namespace App\Filament\Admin\Resources\AboutPageResource\Pages;

use App\Filament\Admin\Resources\AboutPageResource;
use Filament\Resources\Pages\EditRecord;

class EditAboutPage extends EditRecord
{
    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
