<?php

namespace App\Filament\Resources\CatogoryResource\Pages;

use App\Filament\Resources\CatogoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCatogories extends ListRecords
{
    protected static string $resource = CatogoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
