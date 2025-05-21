<?php

namespace App\Filament\Resources\TentangDesaResource\Pages;

use App\Filament\Resources\TentangDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\TentangDesa;
use Filament\Resources\Components\Tab;

class ListTentangDesas extends ListRecords
{
    protected static string $resource = TentangDesaResource::class;

    protected static ?string $title = 'Sambutan, sejarah, visi & misi';
    protected static ?string $breadcrumb = 'Sambutan, sejarah, visi & misi';

    protected function getHeaderActions(): array
    {
        if(TentangDesa::count() === 0) {
            return [
                Actions\CreateAction::make()->label('Buat Data'),
            ];
        }
        return [];
    }


}
