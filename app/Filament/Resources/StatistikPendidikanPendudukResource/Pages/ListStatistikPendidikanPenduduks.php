<?php

namespace App\Filament\Resources\StatistikPendidikanPendudukResource\Pages;

use App\Filament\Resources\StatistikPendidikanPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatistikPendidikanPenduduks extends ListRecords
{
    protected static string $resource = StatistikPendidikanPendudukResource::class;
    protected static ?string $title = 'Statistik Penduduk Berdasarkan Pendidikan';
    protected static ?string $breadcrumb = 'Index';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus'),
        ];
    }
}
