<?php

namespace App\Filament\Resources\GalleryDesaResource\Pages;

use App\Filament\Resources\GalleryDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGalleryDesas extends ListRecords
{
    protected static string $resource = GalleryDesaResource::class;

    protected static ?string $title = 'Gallery Desa';
    protected static ?string $breadcrumb = 'Index';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus'),
        ];
    }
}
