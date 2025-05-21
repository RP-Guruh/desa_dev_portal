<?php

namespace App\Filament\Resources\StructureOrganizationResource\Pages;

use App\Filament\Resources\StructureOrganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStructureOrganizations extends ManageRecords
{
    protected static string $resource = StructureOrganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')
            ->icon('heroicon-o-plus')
            ->color('primary'),
        ];
    }
}
