<?php

namespace App\Filament\Resources\StatistikAgamaPendudukResource\Pages;

use App\Filament\Resources\StatistikAgamaPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatistikAgamaPenduduks extends ListRecords
{
    protected static string $resource = StatistikAgamaPendudukResource::class;

    protected static ?string $title = 'Statistik Penduduk Berdasarkan Agama';
    protected static ?string $breadcrumb = 'Index';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus'),
        ];
    }
}
