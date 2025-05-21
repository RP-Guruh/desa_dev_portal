<?php

namespace App\Filament\Resources\TentangDesaResource\Pages;

use App\Filament\Resources\TentangDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\MisiDesa;
use Filament\Notifications\Notification;

class EditTentangDesa extends EditRecord
{
    protected static string $resource = TentangDesaResource::class;

    protected function getRedirectUrl(): ?string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil diubah')
            ->body('Tentang Desa berhasil diubah & sudah tersimpan di database.')
            ->success()
            ->send();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('kata_sambutan')
                    ->label('Kata sambutan Kepala Desa')
                    ->required()
                    ->placeholder('Ketik Kata sambutan Kepala Desa disini')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('sejarah')
                    ->label('Sejarah Desa')
                    ->placeholder('Ketik Sejarah Desa disini')
                    ->columnSpanFull(),

                Forms\Components\Section::make('Visi & Misi')
                    ->description('Visi dan misi yang menjadi tujuan dan langkah-langkah dalam membangun desa')
                    ->schema([
                        Forms\Components\TextArea::make('visi')
                            ->label('Visi Desa')
                            ->placeholder('Ketik Visi Desa disini')
                            ->rows(3)
                            ->required()
                            ->columnSpanFull(),

                            Forms\Components\Repeater::make('misi')
                                ->relationship('misi') 
                                ->schema([
                                    Forms\Components\TextInput::make('misi')
                                        ->required()
                                        ->label('Misi Desa')
                                        ->helperText('Misi desa dapat lebih dari satu, klik "tambah misi" untuk menambah misi desa')
                                        ->placeholder('Ketik Misi Desa di sini'),
                                ])
                                ->addActionLabel('Tambah Misi'),
                    ])
            ]);
    }
}
