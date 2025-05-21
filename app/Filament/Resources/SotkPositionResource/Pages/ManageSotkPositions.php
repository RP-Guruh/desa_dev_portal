<?php

namespace App\Filament\Resources\SotkPositionResource\Pages;

use App\Filament\Resources\SotkPositionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSotkPositions extends ManageRecords
{
    protected static string $resource = SotkPositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Posisi SOTK')
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }
}
