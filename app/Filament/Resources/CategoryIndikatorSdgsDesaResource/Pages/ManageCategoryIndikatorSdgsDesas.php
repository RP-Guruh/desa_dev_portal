<?php

namespace App\Filament\Resources\CategoryIndikatorSdgsDesaResource\Pages;

use App\Filament\Resources\CategoryIndikatorSdgsDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCategoryIndikatorSdgsDesas extends ManageRecords
{
    protected static string $resource = CategoryIndikatorSdgsDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Category SDGs')
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }
}
