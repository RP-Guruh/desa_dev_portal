<?php

namespace App\Filament\Resources\BatasWilayahResource\Pages;

use App\Filament\Resources\BatasWilayahResource;
use Filament\Resources\Pages\Page;
use App\Models\BatasWilayah;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

class IndexBatasWilayah extends Page
{
    protected static string $resource = BatasWilayahResource::class;

    protected static string $view = 'filament.resources.batas-wilayah-resource.pages.index-batas-wilayah';

    protected static ?string $title = 'Batas Wilayah & Luas Desa';

    protected function getHeaderActions(): array
    {
        $batasWilayah = BatasWilayah::first();
        
        return [
            $batasWilayah === null
                ? Actions\CreateAction::make()
                    ->label('Tambah Data')
                    ->icon('heroicon-o-plus')
                : Actions\Action::make('editData')
                    ->label('Edit Data')
                    ->icon('heroicon-o-pencil')
                    ->form([
                        TextInput::make('batas_utara')
                            ->label('Batas Utara')
                            ->maxlength(255)
                            ->placeholder('Ketik batas wilayah di sini, misal: Desa XXX'),
                        TextInput::make('batas_timur')
                            ->label('Batas Timur')
                            ->maxlength(255)
                            ->placeholder('Ketik batas wilayah di sini, misal: Desa XXX'),
                        TextInput::make('batas_selatan')
                            ->label('Batas Selatan')
                            ->maxlength(255)
                            ->placeholder('Ketik batas wilayah di sini, misal: Desa XXX'),
                        TextInput::make('batas_barat')
                            ->label('Batas Barat')
                            ->maxlength(255)
                            ->placeholder('Ketik batas wilayah di sini, misal: Desa XXX'),
                        TextInput::make('luas_wilayah')
                            ->label('Luas Wilayah')
                            ->numeric()
                            ->required()
                            ->default(123)
                            ->suffix('km²'),
                    ])
                    ->mountUsing(function (Action $action) use ($batasWilayah) {
                        return [
                            'batas_utara'   => $batasWilayah->batas_utara,
                            'batas_timur'   => $batasWilayah->batas_timur,
                            'batas_selatan' => $batasWilayah->batas_selatan,
                            'batas_barat'   => $batasWilayah->batas_barat,
                            'luas_wilayah'  => $batasWilayah->luas_wilayah,
                        ];
                    })
                    
                    ->action(function (array $data) use ($batasWilayah) {
                        $batasWilayah->update($data);
                        return Notification::make()
                            ->title('Berhasil diubah')
                            ->body('Data berhasil diubah & sudah tersimpan di database.')
                            ->success()
                            ->send();
                    }),
        ];
    }

 
    protected function getHeaderWidgets(): array
    {
        return [
            BatasWilayahResource\Widgets\BatasWilayahOverview::class,
        ];
    }
}
