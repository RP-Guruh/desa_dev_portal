<?php

namespace App\Filament\Resources\TentangDesaResource\Pages;

use App\Filament\Resources\TentangDesaResource;
use Filament\Resources\Pages\Page;
use App\Models\TentangDesa;
use App\Models\MisiDesa as Misi;
use Filament\Pages\Actions\Action;

class IndexTentangDesa extends Page
{
    protected static string $resource = TentangDesaResource::class;

    protected static string $view = 'filament.resources.tentang-desa-resource.pages.index-tentang-desa';

    protected static ?string $title = 'Sambutan, Sejarah, Visi dan Misi Desa';

    public $record;
    public $misis;

    protected function getHeaderActions(): array
    {   
        if(!$this->record) {
            return [
                Action::make('create')
                    ->label('Buat Data')
                    ->url(\App\Filament\Resources\TentangDesaResource::getUrl('create'))
                    ->color('primary'),
            ];
        } 
        else {
            return [
                Action::make('edit')
                    ->label('Edit Data')
                    ->url(\App\Filament\Resources\TentangDesaResource::getUrl('edit', ['record' => $this->record->id]))
                    ->color('primary'),
            ];
        }
       
    }

    public function mount()
    {
        $this->record = TentangDesa::first();
        $this->misis = Misi::all();
    }
}
