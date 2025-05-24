<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikUsiaPendudukResource\Pages;
use App\Filament\Resources\StatistikUsiaPendudukResource\RelationManagers;
use App\Models\StatistikUsiaPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatistikUsiaPendudukResource extends Resource
{
    protected static ?string $model = StatistikUsiaPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Statistik Kependudukan';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Berdasarkan Usia';

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
                Tables\Columns\TextColumn::make('usia_min')
                    ->label('Usia Minimum')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('usia_max')
                    ->label('Usia Maximum')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => $state === 'L' ? 'Laki-Laki' : ($state === 'P' ? 'Perempuan' : $state)),
                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah Penduduk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListStatistikUsiaPenduduks::route('/'),
            'create' => Pages\CreateStatistikUsiaPenduduk::route('/create'),
            'edit' => Pages\EditStatistikUsiaPenduduk::route('/{record}/edit'),
        ];
    }
}
