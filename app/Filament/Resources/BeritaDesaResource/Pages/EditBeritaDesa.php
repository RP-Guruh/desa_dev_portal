<?php

namespace App\Filament\Resources\BeritaDesaResource\Pages;

use App\Filament\Resources\BeritaDesaResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class EditBeritaDesa extends EditRecord
{
    protected static string $resource = BeritaDesaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul Berita')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan Judul Berita')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug Berita')
                    ->required()
                    ->maxLength(255)
                    ->readOnly()
                    ->unique(ignoreRecord: true)
                    ->placeholder('Masukkan Slug Berita'),

                Forms\Components\RichEditor::make('isi')
                    ->label('Konten Berita')
                    ->required()
                    ->placeholder('Masukkan Konten Berita')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Thumbnail Berita')
                    ->image()
                    ->required()
                    ->maxSize(1024) // 1MB
                    ->directory('thumbnail-berita-desa')
                    ->preserveFilenames()
                    ->placeholder('Unggah Thumnail Berita')
                    ->acceptedFileTypes(['image/*'])
                    ->columnSpanFull(),

                Forms\Components\DateTimePicker::make('tanggal_publikasi')
                    ->label('Tanggal Publikasi')
                    ->required()
                    ->default(now())
                    ->timezone('Asia/Jakarta')
                    ->native(false)
                    ->placeholder('Pilih Tanggal Publikasi'),
                Forms\Components\Toggle::make('status')
                    ->label('Status')
                    ->default(false)
                    ->inline()
                    ->helperText('Aktifkan untuk mempublikasikan berita ini'),
            
            ]);
    }
}
