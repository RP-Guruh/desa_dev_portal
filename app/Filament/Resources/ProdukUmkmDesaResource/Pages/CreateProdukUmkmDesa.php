<?php

namespace App\Filament\Resources\ProdukUmkmDesaResource\Pages;

use App\Filament\Resources\ProdukUmkmDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class CreateProdukUmkmDesa extends CreateRecord
{
    protected static string $resource = ProdukUmkmDesaResource::class;
    protected static ?string $title = 'Tambah Produk UMKM Desa';
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;   
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function form(Form $form): Form
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
}
