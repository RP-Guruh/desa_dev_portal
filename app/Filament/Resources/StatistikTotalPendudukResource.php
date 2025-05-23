<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikTotalPendudukResource\Pages;
use App\Filament\Resources\StatistikTotalPendudukResource\RelationManagers;
use App\Models\StatistikTotalPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatistikTotalPendudukResource extends Resource
{
    protected static ?string $model = StatistikTotalPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Statistik Kependudukan';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Total Penduduk';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    
    protected function getTableQuery(): Builder
    {
        return StatistikTotalPenduduk::query(); 
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('total_penduduk')
                    ->label('Total Penduduk')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('laki_laki')
                    ->label('Laki-Laki')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('perempuan')
                    ->label('Perempuan')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\IndexTotalPenduduk::route('/'),
            'create' => Pages\CreateStatistikTotalPenduduk::route('/create'),
            'edit' => Pages\EditStatistikTotalPenduduk::route('/{record}/edit'),
        ];
    }
}
