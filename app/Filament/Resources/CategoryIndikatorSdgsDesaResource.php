<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryIndikatorSdgsDesaResource\Pages;
use App\Models\CategoryIndikatorSdgsDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;

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
                Forms\Components\TextInput::make('name')
                    ->label('Nama Kategori Indikator')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('kode_indikator', Str::slug($state)))
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kode_indikator')
                    ->label('Kode Indikator')
                    ->required()
                    ->maxLength(50)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Indikator'),
                Tables\Columns\TextColumn::make('kode_indikator')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategoryIndikatorSdgsDesas::route('/'),
        ];
    }
}
