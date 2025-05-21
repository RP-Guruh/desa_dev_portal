<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangDesaResource\Pages;
use App\Filament\Resources\TentangDesaResource\RelationManagers;
use App\Models\TentangDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TentangDesaResource extends Resource
{
    protected static ?string $model = TentangDesa::class;

    protected static?string $navigationGroup = 'Profil Desa';

    protected static?string $navigationLabel = 'Tentang Desa';

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    
    protected static ?string $breadcrumb = 'Tentang desa';
    
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\IndexTentangDesa::route('/'),
            'create' => Pages\CreateTentangDesa::route('/create'),
            'edit' => Pages\EditTentangDesa::route('/{record}/edit'),
        ];
    }
}
