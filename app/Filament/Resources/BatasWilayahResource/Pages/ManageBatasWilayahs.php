<?php

namespace App\Filament\Resources\BatasWilayahResource\Pages;

use App\Filament\Resources\BatasWilayahResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use App\Models\BatasWilayah;
use Filament\Forms\Form;

class ManageBatasWilayahs extends ManageRecords
{
    protected static string $resource = BatasWilayahResource::class;

    protected function getHeaderActions(): array
    {
        $batasWilayah = BatasWilayah::first();
        
        return [
            $batasWilayah === null
                ? Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus')
                : Actions\EditAction::make()
                    ->label('Edit Data')
                    ->icon('heroicon-o-pencil')
                    ->record($batasWilayah),
        ];
    }


}
