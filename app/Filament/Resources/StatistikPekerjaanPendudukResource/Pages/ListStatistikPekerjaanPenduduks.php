<?php

namespace App\Filament\Resources\StatistikPekerjaanPendudukResource\Pages;

use App\Filament\Resources\StatistikPekerjaanPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatistikPekerjaanPenduduks extends ListRecords
{
    protected static string $resource = StatistikPekerjaanPendudukResource::class;

    protected static ?string $title = 'Statistik Penduduk Berdasarkan Pekerjaan';
    protected static ?string $breadcrumb = 'Index';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus'),
        ];
    }
}
