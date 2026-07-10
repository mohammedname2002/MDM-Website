<?php

namespace App\Filament\Admin\Resources\SubSubcategoryResource\Pages;

use App\Filament\Admin\Resources\SubSubcategoryResource;
use App\Models\Subcategory;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubSubcategory extends EditRecord
{
    protected static string $resource = SubSubcategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Populate the helper "category" select from the stored subcategory.
        if (! empty($data['subcategory_id'])) {
            $data['category_id'] = Subcategory::query()
                ->whereKey($data['subcategory_id'])
                ->value('category_id');
        }

        return $data;
    }
}
