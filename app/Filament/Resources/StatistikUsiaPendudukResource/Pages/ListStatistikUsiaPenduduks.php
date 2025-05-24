<?php

namespace App\Filament\Resources\StatistikUsiaPendudukResource\Pages;

use App\Filament\Resources\StatistikUsiaPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatistikUsiaPenduduks extends ListRecords
{
    protected static string $resource = StatistikUsiaPendudukResource::class;

    protected static ?string $title = 'Statistik Penduduk Berdasarkan Usia';
    protected static ?string $breadcrumb = 'Index';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus'),
        ];
    }
}
