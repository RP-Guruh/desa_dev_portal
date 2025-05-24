<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikPernikahanPendudukResource\Pages;
use App\Models\StatistikPernikahanPenduduk;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Enums\PernikahanEnum;

class StatistikPernikahanPendudukResource extends Resource
{
    protected static ?string $model = StatistikPernikahanPenduduk::class;

    
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Statistik Kependudukan';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Berdasarkan Pernikahan';

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
                Tables\Columns\TextColumn::make('status')
                    ->label('Status Pernikahan Penduduk')               
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn (?string $state): string =>
                    PernikahanEnum::cariNamaPernikahan($state)?->label()
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
                    ->options(StatistikPernikahanPenduduk::pluck('tahun')->unique())
                    ->label('Tahun'),
                Tables\Filters\SelectFilter::make('status')
                    ->options(StatistikPernikahanPenduduk::pluck('status')->unique())
                    ->label('Status Pernikahan Penduduk'),
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
            'index' => Pages\ListStatistikPernikahanPenduduks::route('/'),
            'create' => Pages\CreateStatistikPernikahanPenduduk::route('/create'),
            'edit' => Pages\EditStatistikPernikahanPenduduk::route('/{record}/edit'),
        ];
    }
}
