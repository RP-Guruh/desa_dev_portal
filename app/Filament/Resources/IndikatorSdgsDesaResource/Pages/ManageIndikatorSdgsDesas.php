<?php

namespace App\Filament\Resources\IndikatorSdgsDesaResource\Pages;

use App\Filament\Resources\IndikatorSdgsDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageIndikatorSdgsDesas extends ManageRecords
{
    protected static string $resource = IndikatorSdgsDesaResource::class;

    

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Penilaian SDGs')
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }
}
