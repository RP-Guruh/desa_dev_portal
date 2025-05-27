<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryIndikatorSdgsDesaResource\Pages;
use App\Filament\Resources\CategoryIndikatorSdgsDesaResource\RelationManagers;
use App\Models\CategoryIndikatorSdgsDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryIndikatorSdgsDesaResource extends Resource
{
    protected static ?string $model = CategoryIndikatorSdgsDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Sustainable Development Goals/SDGs';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Category Indikator';

    protected static ?string $pluralLabel = 'Category Indikator SDGs Desa';

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
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategoryIndikatorSdgsDesas::route('/'),
        ];
    }
}
