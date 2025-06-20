<?php

namespace App\Filament\Resources\StatistikTotalPendudukResource\Pages;

use App\Filament\Resources\StatistikTotalPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;

class CreateStatistikTotalPenduduk extends CreateRecord
{
    protected static string $resource = StatistikTotalPendudukResource::class;
    protected static ?string $title = 'Buat Data Statistik Jumlah Penduduk';

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormActions(): array 
    {
        return [
            Actions\Action::make('submit')
                ->label('Simpan Data')
                ->action('create')
                ->color('success'),

            Actions\Action::make('cancel')
                ->label('Kembali')
                ->url('/admin/statistik-total-penduduks')
                ->color('danger'),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jumlah_lakilaki')
                    ->label('Jumlah Penduduk Laki-Laki')
                    ->numeric()
                    ->placeholder('Masukkan Jumlah Penduduk Laki-Laki')
                    ->suffix('Jiwa')
                    ->live(debounce: 500)
                    ->afterStateUpdated(function ($state, Set $set, $get) {
                        $lakiLaki = (int) $state ?: 0;
                        $perempuan = (int) $get('jumlah_perempuan') ?: 0;
                        $set('jumlah_penduduk', $lakiLaki + $perempuan);
                    }),

                Forms\Components\TextInput::make('jumlah_perempuan')
                    ->label('Jumlah Penduduk Perempuan')
                    ->numeric()
                    ->placeholder('Masukkan Jumlah Penduduk Perempuan')
                    ->suffix('Jiwa')
                    ->live(debounce: 500)
                    ->afterStateUpdated(function ($state, Set $set, $get) {
                        $perempuan = (int) $state ?: 0;
                        $lakiLaki = (int) $get('jumlah_lakilaki') ?: 0;
                        $set('jumlah_penduduk', $lakiLaki + $perempuan);
                    }),

                Forms\Components\TextInput::make('jumlah_kk')
                    ->label('Jumlah Kepala Keluarga')
                    ->numeric()
                    ->placeholder('Masukkan Jumlah Kepala Keluarga')
                    ->suffix('Jiwa'),

                Forms\Components\TextInput::make('jumlah_penduduk')
                    ->label('Jumlah Penduduk')
                    ->reactive()
                    ->numeric()
                    ->helperText('Jumlah Penduduk = Jumlah Laki-Laki + Jumlah Perempuan | Jika tidak sesuai dapat diubah')
                    ->placeholder('Masukkan Jumlah Penduduk')
                    ->suffix('Jiwa'),
                
                Forms\Components\Select::make('tahun')
                    ->label('Tahun')
                    ->options(
                        collect(range(date('Y'), 1900))->mapWithKeys(fn ($year) => [$year => $year])->toArray()
                    )
                    ->searchable()
                    ->required()
                    
            ]);
    }
}
