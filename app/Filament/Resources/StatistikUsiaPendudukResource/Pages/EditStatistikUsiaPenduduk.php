<?php

namespace App\Filament\Resources\StatistikUsiaPendudukResource\Pages;

use App\Filament\Resources\StatistikUsiaPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Forms\Form;

class EditStatistikUsiaPenduduk extends EditRecord
{
    protected static string $resource = StatistikUsiaPendudukResource::class;
    protected static ?string $title = 'Ubah Data Statistik Usia Penduduk';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('usia_min')
                    ->label('Usia Minimum')
                    ->required()
                    ->placeholder('Masukkan Usia Minimum')
                    ->suffix('Tahun')
                    ->numeric(),
                Forms\Components\TextInput::make('usia_max')
                    ->label('Usia Maximum')
                    ->required()
                    ->placeholder('Masukkan Usia Maximum')
                    ->suffix('Tahun')
                    ->numeric(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required()
                    ->searchable()
                    ->placeholder('Pilih Jenis Kelamin'),
                    
                Forms\Components\TextInput::make('jumlah')
                    ->label('Jumlah Penduduk')
                    ->required()
                    ->placeholder('Masukkan Jumlah Penduduk')
                    ->suffix('Jiwa')
                    ->numeric(),
                Forms\Components\Select::make('tahun')
                    ->label('Tahun')
                    ->placeholder('Data Tahun Kependudukan')
                    ->options(
                        collect(range(date('Y'), 1900))->mapWithKeys(fn ($year) => [$year => $year])->toArray()
                    )
                    ->searchable()
                    ->required()
            ]);
    }
}
