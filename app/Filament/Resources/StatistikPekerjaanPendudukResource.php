<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikPekerjaanPendudukResource\Pages;
use App\Models\StatistikPekerjaanPenduduk;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Enums\PekerjaanEnum;

class StatistikPekerjaanPendudukResource extends Resource
{
    protected static ?string $model = StatistikPekerjaanPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Statistik Kependudukan';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Berdasarkan Pekerjaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pekerjaan')
                    ->label('Jenis Pekerjaan')               
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn (?string $state): string =>
                    PekerjaanEnum::cariNamaPekerjaan($state)?->label()
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
                    ->options(StatistikPekerjaanPenduduk::pluck('tahun')->unique())
                    ->label('Tahun'),
                Tables\Filters\SelectFilter::make('pekerjaan')
                    ->options(StatistikPekerjaanPenduduk::pluck('pekerjaan')->unique())
                    ->label('Jenis Pekerjaan'),
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
            'index' => Pages\ListStatistikPekerjaanPenduduks::route('/'),
            'create' => Pages\CreateStatistikPekerjaanPenduduk::route('/create'),
            'edit' => Pages\EditStatistikPekerjaanPenduduk::route('/{record}/edit'),
        ];
    }
}
