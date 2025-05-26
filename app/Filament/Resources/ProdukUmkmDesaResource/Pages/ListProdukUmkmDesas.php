<?php

namespace App\Filament\Resources\ProdukUmkmDesaResource\Pages;

use App\Filament\Resources\ProdukUmkmDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdukUmkmDesas extends ListRecords
{
    protected static string $resource = ProdukUmkmDesaResource::class;

    protected static ?string $title = 'Produk UMKM Desa';
    protected static ?string $breadcrumb = 'Index';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus'),
        ];
    }
}
