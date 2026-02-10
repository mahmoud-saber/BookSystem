<?php

namespace App\Filament\Admin\Resources\Authers\Pages;

use App\Filament\Admin\Resources\Authers\AutherResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAuther extends ViewRecord
{
    protected static string $resource = AutherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
