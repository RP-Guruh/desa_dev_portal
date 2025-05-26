<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukUmkmDesaResource\Pages;
use App\Models\ProdukUmkmDesa;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Notifications\Notification;
use Filament\Tables\Table;
use Filament\Support\Enums\ActionSize;
use Filament\Forms;

class ProdukUmkmDesaResource extends Resource
{
    protected static ?string $model = ProdukUmkmDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'UMKM Desa';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Produk UMKM Desa';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nama_produk')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                ->label('Nama Produk')
                ->placeholder('Masukkan nama produk'),
            
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->readOnly()
                ->label('Slug')
                ->placeholder('Masukkan slug produk'),

            Forms\Components\Textarea::make('deskripsi')
                ->nullable()
                ->rows(8)
                ->label('Deskripsi')
                ->placeholder('Masukkan deskripsi produk')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('penjual')
                ->required()
                ->maxLength(255)
                ->label('Nama Penjual')
                ->placeholder('Masukkan nama penjual'),
            Forms\Components\TextInput::make('nowa_hp')
                ->nullable()
                ->maxLength(20)
                ->label('Nomor WhatsApp')
                ->placeholder('Masukkan nomor WhatsApp penjual'),
            Forms\Components\TextInput::make('harga')
                ->required()
                ->numeric()
                ->default(0.00)
                ->label('Harga')
                ->placeholder('Masukkan harga produk')
                ->prefix('Rp'),
            Forms\Components\FileUpload::make('thumbnail')
                ->label('Thumbnail Produk')
                ->required()
                ->directory('thumbnail-produk')
                ->preserveFilenames()
                ->acceptedFileTypes(['image/jpeg', 'image/png'])
                ->maxSize(1024)
                ->helperText('Format yang diizinkan: JPG, PNG. Maksimal 1MB'),

            Forms\Components\Section::make('Foto-foto produk')
                ->schema([
                    Forms\Components\Repeater::make('photos')
                        ->relationship()
                        ->schema([
                            Forms\Components\FileUpload::make('photo')
                                ->label('Foto Produk')
                                ->required()
                                ->directory('foto-produk')
                                ->preserveFilenames()
                                ->acceptedFileTypes(['image/jpeg', 'image/png'])
                                ->maxSize(1024)
                                ->helperText('Format yang diizinkan: JPG, PNG. Maksimal 1MB'),
                        ])->reorderableWithButtons()
                ]),
        ])
        ->columns(2);    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_produk')->label('Produk'),
                Tables\Columns\TextColumn::make('penjual')->label('Penjual'),
                Tables\Columns\TextColumn::make('harga')->label('Harga (Rupiah)'),
                Tables\Columns\ImageColumn::make('thumbnail')->label('Thumbnail'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Status')
                ->afterStateUpdated(function ($record, $state) {
                    try {
                        $record->is_active = $state;
                        $record->save();
                        $message = $state 
                        ? 'Produk diaktifkan dan akan terlihat di web portal.' 
                        : 'Produk dinonaktifkan dan akan disembunyikan di web portal.';                        
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
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])->label('More actions')
                ->icon('heroicon-m-ellipsis-vertical')
                ->size(ActionSize::Small)
                ->color('primary')
                ->button()
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
            'index' => Pages\ListProdukUmkmDesas::route('/'),
            'create' => Pages\CreateProdukUmkmDesa::route('/create'),
            'edit' => Pages\EditProdukUmkmDesa::route('/{record}/edit'),
        ];
    }
}
