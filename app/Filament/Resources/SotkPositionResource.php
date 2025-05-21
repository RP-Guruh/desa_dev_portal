<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SotkPositionResource\Pages;
use App\Models\SotkPosition;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms;
use Filament\Notifications\Notification;

class SotkPositionResource extends Resource
{
    protected static ?string $model = SotkPosition::class;

    protected static?string $navigationGroup = 'Profil Desa';

    protected static?string $navigationLabel = 'Posisi SOTK';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 2;
    
    protected static ?string $breadcrumb = 'Posisi SOTK';

    protected static ?string $slug = 'sotk-position';

    protected static ?string $label = 'Posisi Struktur Organisasi dan Tata Kerja (SOTK)';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nama Posisi')
                ->required()
                ->placeholder('Ketik nama posisi disini')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('description')
                ->label('Deskripsi')
                ->required()
                ->placeholder('Ketik deskripsi disini')
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Posisi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->sortable()
                    ->searchable(),
                ToggleColumn::make('status')
                    ->afterStateUpdated(function ($record, $state) {
                        try {
                            $record->status = $state;
                            $record->save();
                            $message = $state 
                            ? 'Posisi SOTK diaktifkan dan akan terlihat saat membuat SOTK.' 
                            : 'Posisi SOTK dinonaktifkan dan akan disembunyikan saat membuat SOTK.';                        
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
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit')
                    ->action(function (SotkPosition $record) {
                        return Notification::make()
                        ->title('Berhasil diubah')
                        ->body('Data berhasil diubah & sudah tersimpan di database.')
                        ->success()
                        ->send();
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSotkPositions::route('/'),
        ];
    }
}
