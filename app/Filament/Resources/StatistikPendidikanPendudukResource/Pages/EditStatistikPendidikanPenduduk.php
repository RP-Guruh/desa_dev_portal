<?php

namespace App\Filament\Resources\StatistikPendidikanPendudukResource\Pages;

use App\Filament\Resources\StatistikPendidikanPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Forms\Form;
use App\Enums\PendidikanEnum;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;

class EditStatistikPendidikanPenduduk extends EditRecord
{
    protected static string $resource = StatistikPendidikanPendudukResource::class;

    protected static ?string $title = 'Edit Data Statistik Usia Penduduk';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $existingRecord = DB::table('statistik_pendidikan_penduduks')
            ->where('tahun', $data['tahun'])
            ->where('tingkat_pendidikan', $data['tingkat_pendidikan'])
            ->where('id', '!=', $this->record->id)
            ->first();

        if ($existingRecord) {
            Notification::make()
                ->title('Data Sudah Ada')
                ->body('Data Statistik Pendidikan Penduduk untuk tahun ' . $data['tahun'] . ' dan tingkat pendidikan ' . $data['tingkat_pendidikan'] . ' sudah ada.')
                ->danger()
                ->send();
                throw ValidationException::withMessages([
                    'tingkat_pendidikan' => 'Kombinasi tingkat pendidikan dan tahun sudah ada.',
                    'tahun' => 'Kombinasi tingkat pendidikan dan tahun sudah ada.',
                ]);
        }
        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tingkat_pendidikan')
                    ->label('Tingkat Pendidikan')
                    ->required()
                    ->searchable()
                    ->placeholder('Pilih Tingkat Pendidikan Penduduk')
                    ->options(PendidikanEnum::options()),

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
