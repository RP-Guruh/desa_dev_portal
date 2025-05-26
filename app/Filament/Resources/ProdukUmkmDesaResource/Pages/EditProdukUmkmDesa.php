<?php

namespace App\Filament\Resources\ProdukUmkmDesaResource\Pages;

use App\Filament\Resources\ProdukUmkmDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdukUmkmDesa extends EditRecord
{
    protected static string $resource = ProdukUmkmDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
