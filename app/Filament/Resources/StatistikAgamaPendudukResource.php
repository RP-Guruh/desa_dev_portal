<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikAgamaPendudukResource\Pages;
use App\Models\StatistikAgamaPenduduk;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Enums\AgamaEnum;

class StatistikAgamaPendudukResource extends Resource
{
    protected static ?string $model = StatistikAgamaPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationGroup = 'Statistik Kependudukan';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Berdasarkan Agama';

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
                Tables\Columns\TextColumn::make('agama')
                    ->label('Agama / Kepercayaan Penduduk')               
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn (?string $state): string =>
                    AgamaEnum::cariNamaAgama($state)?->label()
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
                    ->options(StatistikAgamaPenduduk::pluck('tahun')->unique())
                    ->label('Tahun'),
                Tables\Filters\SelectFilter::make('agama')
                    ->options(StatistikAgamaPenduduk::pluck('agama')->unique())
                    ->label('Agama / Kepercayaan Penduduk'),
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
            'index' => Pages\ListStatistikAgamaPenduduks::route('/'),
            'create' => Pages\CreateStatistikAgamaPenduduk::route('/create'),
            'edit' => Pages\EditStatistikAgamaPenduduk::route('/{record}/edit'),
        ];
    }
}
