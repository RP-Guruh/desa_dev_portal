<?php

namespace App\Filament\Resources\StatistikTotalPendudukResource\Pages;

use App\Filament\Resources\StatistikTotalPendudukResource;
use App\Models\StatistikTotalPenduduk;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Action;

class IndexTotalPenduduk extends Page
{
    protected static string $resource = StatistikTotalPendudukResource::class;

    protected static string $view = 'filament.resources.statistik-total-penduduk-resource.pages.index-total-penduduk';

    protected static ?string $title = 'Jumlah Penduduk Desa';
    
    public $record;

    protected function getHeaderActions(): array
    {   
        if(!$this->record) {
            return [
                Action::make('create')
                    ->label('Buat Data')
                    ->url(\App\Filament\Resources\StatistikTotalPendudukResource::getUrl('create'))
                    ->color('primary'),
            ];
        } 
        else {
            return [
                Action::make('edit')
                    ->label('Edit Data')
                    ->url(\App\Filament\Resources\StatistikTotalPendudukResource::getUrl('edit', ['record' => $this->record->id]))
                    ->color('primary'),
            ];
        }
       
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatistikTotalPendudukResource\Widgets\TotalPendudukOverview::class,
        ];
    }

    public function mount()
    {
        $this->record = StatistikTotalPenduduk::first();
    }
}
