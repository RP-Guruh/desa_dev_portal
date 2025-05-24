<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikPendidikanPendudukResource\Pages;
use App\Models\StatistikPendidikanPenduduk;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Enums\PendidikanEnum;

class StatistikPendidikanPendudukResource extends Resource
{
    protected static ?string $model = StatistikPendidikanPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Statistik Kependudukan';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Berdasarkan Pendidikan';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tingkat_pendidikan')
                    ->label('Tingkat Pendidikan')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'TIDAK_BELUM_SEKOLAH' => 'danger',
                        'BELUM_TAMAT_SD' => 'warning',
                        'TAMAT_SD' => 'primary',
                        'SMP' => 'info',
                        'SMA' => 'success',
                        'DIPLOMA_I_II' => 'secondary',
                        'DIPLOMA_III' => 'secondary',
                        'DIPLOMA_IV_STRATA_I' => 'secondary',
                        'STRATA_II' => 'secondary',
                        'STRATA_III' => 'secondary',
                        default => 'secondary', 
                    })                    
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn (?string $state): string =>
                    PendidikanEnum::cariNamaPendidikan($state)?->label()
                ),

                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah Penduduk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),
            ])->filters([
                Tables\Filters\SelectFilter::make('tahun')
                    ->options(StatistikPendidikanPenduduk::pluck('tahun')->unique())
                    ->label('Tahun'),
                Tables\Filters\SelectFilter::make('tingkat_pendidikan')
                    ->options(StatistikPendidikanPenduduk::pluck('tingkat_pendidikan')->unique())
                    ->label('Tingkat Pendidikan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatistikPendidikanPenduduks::route('/'),
            'create' => Pages\CreateStatistikPendidikanPenduduk::route('/create'),
            'edit' => Pages\EditStatistikPendidikanPenduduk::route('/{record}/edit'),
        ];
    }
}
