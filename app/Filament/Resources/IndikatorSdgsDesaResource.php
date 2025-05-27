<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndikatorSdgsDesaResource\Pages;
use App\Models\IndikatorSdgsDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Table;

class IndikatorSdgsDesaResource extends Resource
{
    protected static ?string $model = IndikatorSdgsDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';
    protected static ?string $navigationGroup = 'Sustainable Development Goals/SDGs';
    protected static ?string $navigationLabel = 'Penilaian Indikator SDGs Desa';
    protected static ?int $navigationSort = 4;
    protected static ?string $pluralLabel = 'Penilaian Indikator SDGs Desa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_indikator_sdgs_desa_id')
                    ->label('Kategori Indikator SDGs Desa')
                    ->relationship(name: 'categorySdgs', titleAttribute: 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('nilai')
                    ->label('Nilai')
                    ->required()
                    ->columnSpanFull()
                    ->numeric(),

                Forms\Components\Select::make('tahun')
                    ->label('Tahun')
                    ->placeholder('Data Tahun Penilaian')
                    ->options(
                        collect(range(date('Y'), 1900))->mapWithKeys(fn ($year) => [$year => $year])->toArray()
                    )
                    ->searchable()
                    ->required()
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')->label('Tahun Penilaian'),
                Tables\Columns\TextColumn::make('categorySdgs.name')->label('Kategori SDGs'),
                Tables\Columns\TextColumn::make('nilai')->label('Penilaian')
                    
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])->defaultGroup('tahun');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageIndikatorSdgsDesas::route('/'),
        ];
    }
}
