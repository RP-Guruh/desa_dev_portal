<?php

namespace App\Filament\Resources\StatistikUsiaPendudukResource\Pages;

use App\Filament\Resources\StatistikUsiaPendudukResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class CreateStatistikUsiaPenduduk extends CreateRecord
{
    protected static string $resource = StatistikUsiaPendudukResource::class;
    protected static ?string $title = 'Buat Data Statistik Usia Penduduk';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $existingRecord = DB::table('statistik_usia_penduduks')
            ->where('tahun', $data['tahun'])
            ->where('usia_min', $data['usia_min'])
            ->where('usia_max', $data['usia_max'])
            ->where('jenis_kelamin', $data['jenis_kelamin'])
            ->exists();

        if ($existingRecord) {
            
            Notification::make()
                ->title('Data Sudah Ada')
                ->body('Data Statistik Usia Penduduk untuk rentang ' . $data['usia_min'] . ' sampai dengan ' . $data['usia_max'] . ' tahun '. $data['tahun'].' dan jenis kelamin '. ($data['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan') .' sudah ada.')
                ->danger()
                ->send();
                throw ValidationException::withMessages([
                    'tingkat_pendidikan' => 'Kombinasi tingkat pendidikan dan tahun sudah ada.',
                    'tahun' => 'Kombinasi tingkat pendidikan dan tahun sudah ada.',
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
