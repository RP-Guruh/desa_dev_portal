<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryDesaResource\Pages;
use App\Models\GalleryDesa;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class GalleryDesaResource extends Resource
{
    protected static ?string $model = GalleryDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Berita & Galeri Desa';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Gallery';

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
                Tables\Columns\TextColumn::make('description')->label('Description'),
                Tables\Columns\ImageColumn::make('file')->label('File')->rounded(),
                Tables\Columns\ToggleColumn::make('status')
                ->afterStateUpdated(function ($record, $state) {
                    try {
                        $record->status = $state;
                        $record->save();
                        $message = $state 
                        ? 'Galeri diaktifkan dan akan terlihat di web portal.' 
                        : 'Galeri dinonaktifkan dan akan disembunyikan di web portal.';                        
                        Notification::make()
                            ->title($message)
                            ->success()
                            ->send();
                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Error')
                            ->danger()
                            ->body($e->getMessage())
                            ->send();
                    }                    
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListGalleryDesas::route('/'),
            'create' => Pages\CreateGalleryDesa::route('/create'),
            'edit' => Pages\EditGalleryDesa::route('/{record}/edit'),
        ];
    }
}
