<?php

namespace App\Filament\Resources\StatistikAgamaPendudukResource\Pages;

use App\Filament\Resources\StatistikAgamaPendudukResource;
use Filament\Resources\Pages\CreateRecord;
use App\Enums\AgamaEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class CreateStatistikAgamaPenduduk extends CreateRecord
{
    protected static string $resource = StatistikAgamaPendudukResource::class;

    protected static ?string $title = 'Buat Data Statistik Agama Penduduk';


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $existingRecord = DB::table('statistik_agama_penduduks')
            ->where('tahun', $data['tahun'])
            ->where('agama', $data['agama'])
            ->exists();

        if ($existingRecord) {
            
            Notification::make()
                ->title('Data Sudah Ada')
                ->body('Data Statistik Agama/Kepercayaan '. $data['agama'].' untuk tahun ' . $data['tahun'] . ' sudah ada.')
                ->danger()
                ->send();
                throw ValidationException::withMessages([
                    'agama' => 'Kombinasi agama dan tahun sudah ada.',
                    'tahun' => 'Kombinasi agama dan tahun sudah ada.',
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
                Forms\Components\Select::make('agama')
                    ->label('Agama / Kepercayaan Penduduk')
                    ->required()
                    ->searchable()
                    ->placeholder('Pilih Agama / Kepercayaan Penduduk')
                    ->options(AgamaEnum::options()),

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
