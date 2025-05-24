<?php

namespace App\Filament\Resources\StatistikPekerjaanPendudukResource\Pages;

use App\Filament\Resources\StatistikPekerjaanPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Enums\PekerjaanEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;


class CreateStatistikPekerjaanPenduduk extends CreateRecord
{
    protected static string $resource = StatistikPekerjaanPendudukResource::class;

    protected static ?string $title = 'Buat Data Statistik Pekerjaan Penduduk';


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $existingRecord = DB::table('statistik_pekerjaan_penduduks')
            ->where('tahun', $data['tahun'])
            ->where('pekerjaan', $data['pekerjaan'])
            ->exists();

        if ($existingRecord) {
            
            Notification::make()
                ->title('Data Sudah Ada')
                ->body('Data Statistik Pekerjaan Penduduk untuk tahun ' . $data['tahun'] . ' dan jenis pekerjaan ' . $data['pekerjaan'] . ' sudah ada.')
                ->danger()
                ->send();
                throw ValidationException::withMessages([
                    'pekerjaan' => 'Kombinasi jenis pekerjaan dan tahun sudah ada.',
                    'tahun' => 'Kombinasi jenis pekerjaan dan tahun sudah ada.',
                ]);
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pekerjaan')
                    ->label('Jenis Pekerjaan')
                    ->required()
                    ->searchable()
                    ->lazy()
                    ->optionsLimit(200)
                    ->placeholder('Pilih Jenis Pekerjaan Penduduk')
                    ->options(PekerjaanEnum::options()),

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
