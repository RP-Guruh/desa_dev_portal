<?php

namespace App\Filament\Resources\StatistikPernikahanPendudukResource\Pages;

use App\Filament\Resources\StatistikPernikahanPendudukResource;
use Filament\Resources\Pages\CreateRecord;
use App\Enums\PernikahanEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class CreateStatistikPernikahanPenduduk extends CreateRecord
{
    protected static string $resource = StatistikPernikahanPendudukResource::class;

    protected static ?string $title = 'Buat Data Statistik Status Pernikahan Penduduk';


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $existingRecord = DB::table('statistik_pernikahan_penduduks')
            ->where('tahun', $data['tahun'])
            ->where('status', $data['status'])
            ->exists();

        if ($existingRecord) {
            
            Notification::make()
                ->title('Data Sudah Ada')
                ->body('Data Statistik Status Pernikahan '. $data['status'].' untuk tahun ' . $data['tahun'] . ' sudah ada.')
                ->danger()
                ->send();
                throw ValidationException::withMessages([
                    'status' => 'Kombinasi status pernikahan dan tahun sudah ada.',
                    'tahun' => 'Kombinasi status pernikahan dan tahun sudah ada.',
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
                Forms\Components\Select::make('status')
                    ->label('Status Pernikahan Penduduk')
                    ->required()
                    ->searchable()
                    ->placeholder('Pilih Agama / Kepercayaan Penduduk')
                    ->options(PernikahanEnum::options()),

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
