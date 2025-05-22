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
                ? Actions\Action::make('create')
                ->label('Tambah data')
                ->icon('heroicon-o-plus')
                ->modal()
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
                        ->suffix('km²'),
                ])
                ->action(function (array $data) {
                    BatasWilayah::create([
                        'batas_utara' => $data['batas_utara'],
                        'batas_timur' => $data['batas_timur'],
                        'batas_selatan' => $data['batas_selatan'],
                        'batas_barat' => $data['batas_barat'],
                        'luas_wilayah' => $data['luas_wilayah'],
                    ]);
                    
                    // Refresh the page to reflect the new data
                    $this->redirect($this->getResource()::getUrl('index'));

                    // Display success notification
                    Notification::make()
                        ->title('Data berhasil disimpan')
                        ->success()
                        ->send();
                })
                : Actions\Action::make('edit')
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
                            ->suffix('km²'),
                    ])
                    ->mountUsing(function(Form $form, $record) {
                        $batasWilayah = BatasWilayah::first();
                        $form->fill([
                            'batas_utara'   => $batasWilayah->batas_utara ?? null,
                            'batas_timur'   => $batasWilayah->batas_timur ?? null,
                            'batas_selatan' => $batasWilayah->batas_selatan ?? null,
                            'batas_barat'   => $batasWilayah->batas_barat ?? null,
                            'luas_wilayah'  => $batasWilayah->luas_wilayah ?? null
                        ]);
                    })
                    ->action(function (array $data) use ($batasWilayah) {
                        $batasWilayah->update($data);
                        $this->redirect($this->getResource()::getUrl('index'));
                        Notification::make()
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
