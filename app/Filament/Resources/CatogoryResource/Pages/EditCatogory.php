<?php

namespace App\Filament\Resources\CatogoryResource\Pages;

use App\Filament\Resources\CatogoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCatogory extends EditRecord
{
    protected static string $resource = CatogoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
