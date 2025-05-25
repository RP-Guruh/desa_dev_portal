<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaDesaResource\Pages;
use App\Filament\Resources\BeritaDesaResource\RelationManagers;
use App\Models\BeritaDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\Enums\ActionSize;
use Illuminate\Support\Carbon;

class BeritaDesaResource extends Resource
{
    protected static ?string $model = BeritaDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Berita & Galeri Desa';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul Berita')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Masukkan Judul Berita')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', \Illuminate\Support\Str::slug($state))),

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
                    ->disk('public')
                    ->directory('thumbnail-berita-desa')
                    ->preserveFilenames()
                    ->placeholder('Unggah Thumnail Berita')
                    ->acceptedFileTypes(['image/*'])
                    ->columnSpanFull(),

                Forms\Components\DateTimePicker::make('tanggal_publikasi')
                    ->label('Tanggal Publikasi')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Berita')
                    ->sortable()
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug Berita')
                    ->sortable()
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('tanggal_publikasi')
                    ->label('Tanggal Publikasi')
                    ->dateTime()
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d M Y H:i') : 'Tidak Diketahui'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->sortable()
                    ->searchable()
                    ->color(fn ($state) => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn ($state) => $state ? 'Publish' : 'Draft'),

                Tables\Columns\TextColumn::make('created_by')
                    ->label('Dibuat Oleh')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state ? \App\Models\User::find($state)->name : 'Tidak Diketahui'),

                Tables\Columns\ImageColumn::make('thumbnail')
                ->label('Thumbnail')
                ->disk('public')
                ->size(50)
                ->circular()
                ->placeholder('Belum ada foto')
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
            'index' => Pages\ListBeritaDesas::route('/'),
            'create' => Pages\CreateBeritaDesa::route('/create'),
            'edit' => Pages\EditBeritaDesa::route('/{record}/edit'),
        ];
    }
}
