<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StructureOrganizationResource\Pages;
use App\Models\StructureOrganization;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Notifications\Notification;

class StructureOrganizationResource extends Resource
{
    protected static ?string $model = StructureOrganization::class;
    protected static?string $navigationGroup = 'Profil Desa';
    protected static?string $navigationLabel = 'Struktur Organisasi';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 3;
    protected static ?string $breadcrumb = 'Struktur Organisasi';
    protected static ?string $slug = 'struktural-organization';
    protected static ?string $label = 'Struktur Organisasi';
    protected static ?string $pluralLabel = 'Struktur Organisasi Desa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fullname')
                    ->label('Nama Lengkap')
                    ->required()
                    ->placeholder('Ketik nama lengkap dan gelar disini')
                    ->columnSpanFull()
                    ->required(),

                Forms\Components\Select::make('id_posisi_sotk')
                    ->relationship('sotkPosition', 'name')
                    ->label('Posisi SOTK')
                    ->required()
                    ->placeholder('Pilih posisi SOTK disini')
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('phone_number')
                    ->label('Nomor Telepon / WhatsApp')
                    ->required()
                    ->placeholder('Ketik nomor telepon disini')
                    ->tel()
                    ->columnSpanFull(),
                
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->placeholder('Ketik email disini')
                    ->email()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('photo')
                    ->label('Foto')
                    ->image()
                    ->imageEditor()
                    ->imageResizeUpscale(false)
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('400')
                    ->imageResizeTargetHeight('400')
                    ->required()
                    ->placeholder('Upload foto disini')
                    ->columnSpanFull()
                    ->disk('public')
                    ->directory('structure-organization')
                    ->preserveFilenames(false)
                    ->maxSize(1024)
                    ->fetchFileInformation(false)
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullname')
                    ->label('Nama Lengkap')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('sotkPosition.name')
                    ->label('Posisi SOTK')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Nomor Telepon / WhatsApp')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ImageColumn::make('photo')
                    ->label('Foto')
                    ->disk('public')
                    ->size(50)
                    ->circular()
                    ->placeholder('Belum ada foto')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Edit')
                ->action(function (StructureOrganization $record) {
                    return Notification::make()
                        ->title('Berhasil diubah')
                        ->body('Data berhasil diubah & sudah tersimpan di database.')
                        ->success()
                        ->send();
                }),
                Tables\Actions\DeleteAction::make()
                   
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStructureOrganizations::route('/'),
        ];
    }
}
