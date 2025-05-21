<?php

namespace App\Filament\Resources\TentangDesaResource\Pages;

use App\Filament\Resources\TentangDesaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\MisiDesa;

class CreateTentangDesa extends CreateRecord
{
    
    protected static string $resource = TentangDesaResource::class;
    
    protected static ?string $title = 'Tentang Desa';
    protected static ?string $breadcrumb = 'Tambah Tentang Desa';

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormActions(): array 
    {
        return [
            Actions\Action::make('submit')
                ->label('Simpan Data')
                ->action('create')
                ->color('success'),

            Actions\Action::make('cancel')
                ->label('Kembali')
                ->url('/admin/tentang-desas')
                ->color('danger'),
        ];
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
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
                                ->helperText('Misi desa dapat lebih dari satu, klik "tambah misi" untuk menambah misi desa')
                                ->required()
                                ->label('Misi Desa')
                                ->placeholder('Ketik Misi Desa disini'),
                        ])->addActionLabel('Tambah Misi Desa'),

                    ])
            ]);
    }
}
