<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BatasWilayahResource\Pages;
use App\Filament\Resources\BatasWilayahResource\RelationManagers;
use App\Models\BatasWilayah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BatasWilayahResource extends Resource
{
    protected static ?string $model = BatasWilayah::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static?string $navigationGroup = 'Profil Desa';

    protected static?string $navigationLabel = 'Batas Wilayah';

    protected static ?int $navigationSort = 4;
    
    protected static ?string $breadcrumb = 'batas-wilayah';

    protected static ?string $slug = 'batas-wilayah';

    protected static ?string $pluralLabel = 'Batas Wilayah Desa';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('batas_utara')
                    ->label('Batas Utara Desa')
                    ->maxlength(255)
                    ->placeholder('Ketik batas wilayah disini misal : Desa XXX')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('batas_timur')
                    ->label('Batas Timur Desa')
                    ->maxlength(255)
                    ->placeholder('Ketik batas wilayah disini misal : Desa XXX')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('batas_selatan')
                    ->label('Batas Selatan Desa')
                    ->maxlength(255)
                    ->placeholder('Ketik batas wilayah disini misal : Desa XXX')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('batas_barat')
                    ->label('Batas Barat Desa')
                    ->placeholder('Ketik batas wilayah disini misal : Desa XXX')
                    ->maxlength(255)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('luas_wilayah')
                    ->label('Luas Wilayah')
                    ->numeric()
                    ->required()
                    ->suffix('km²')

            ]);
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\IndexBatasWilayah::route('/'),
            
        ];
    }
}
