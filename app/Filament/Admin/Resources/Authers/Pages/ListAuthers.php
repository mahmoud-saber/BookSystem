<?php

namespace App\Filament\Admin\Resources\Authers\Pages;

use App\Filament\Admin\Resources\Authers\AutherResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAuthers extends ListRecords
{
    protected static string $resource = AutherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
