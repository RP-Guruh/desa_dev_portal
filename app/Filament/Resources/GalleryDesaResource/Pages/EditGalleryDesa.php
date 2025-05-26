<?php

namespace App\Filament\Resources\GalleryDesaResource\Pages;

use App\Filament\Resources\GalleryDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class EditGalleryDesa extends EditRecord
{
    protected static string $resource = GalleryDesaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\FileUpload::make('file')
                ->required()
                ->directory('gallery-desa')
                ->preserveFilenames()
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'])
                ->maxSize(2048)
                ->helperText('Format yang diizinkan: JPG, PNG, GIF, MP4, MOV. Maksimal 2MB'),
    
            Forms\Components\Textarea::make('description')
                ->required()
                ->maxLength(255),
        ])
        ->columns(1);    
    }
}
