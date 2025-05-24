<?php

namespace App\Filament\Resources\StatistikPernikahanPendudukResource\Pages;

use App\Filament\Resources\StatistikPernikahanPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatistikPernikahanPenduduks extends ListRecords
{
    protected static string $resource = StatistikPernikahanPendudukResource::class;

    protected static ?string $title = 'Statistik Penduduk Berdasarkan Pernikahan';
    protected static ?string $breadcrumb = 'Index';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data')->icon('heroicon-o-plus'),
        ];
    }
}
