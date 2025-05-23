<?php

namespace App\Filament\Resources\StatistikTotalPendudukResource\Pages;

use App\Filament\Resources\StatistikTotalPendudukResource;
use App\Models\StatistikTotalPenduduk;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Columns\{TextColumn,BadgeColumn};
class IndexTotalPenduduk extends Page implements HasTable
{
    use InteractsWithTable;


    protected static string $resource = StatistikTotalPendudukResource::class;

    protected static string $view = 'filament.resources.statistik-total-penduduk-resource.pages.index-total-penduduk';

    protected static ?string $title = 'Jumlah Penduduk Desa';
    
    public $record;

    protected function getHeaderActions(): array
    {   
            return [
                Action::make('create')
                    ->label('Buat Data')
                    ->url(\App\Filament\Resources\StatistikTotalPendudukResource::getUrl('create'))
                    ->color('primary'),
            ];
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(StatistikTotalPenduduk::query())
            ->columns([
            BadgeColumn::make('tahun')
                ->colors([
                    'primary',
                ])
                ->sortable()
                ->icons([
                    'heroicon-o-arrow-trending-up' => fn (StatistikTotalPenduduk $record) => StatistikTotalPenduduk::where('tahun', '<', $record->tahun)
                        ->orderBy('tahun', 'desc')
                        ->first()?->jumlah_penduduk < $record->jumlah_penduduk,
                
                    'heroicon-o-arrow-trending-down' => fn (StatistikTotalPenduduk $record) => StatistikTotalPenduduk::where('tahun', '<', $record->tahun)
                        ->orderBy('tahun', 'desc')
                        ->first()?->jumlah_penduduk > $record->jumlah_penduduk,
                ]),
                
            TextColumn::make('jumlah_lakilaki')
                ->label('Jumlah Laki-Laki')
                ->alignEnd()
                ->sortable(),
            TextColumn::make('jumlah_perempuan')
                ->label('Jumlah Perempuan')
                ->alignEnd()
                ->sortable(),
            TextColumn::make('jumlah_kk')
                ->label('Jumlah Kepala Keluarga')
                ->alignEnd()
                ->sortable(),
            TextColumn::make('jumlah_penduduk')
                ->label('Total Penduduk')
                ->alignEnd()
                ->sortable(),
            ])
            ->defaultSort('tahun', 'desc')
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit')
                    ->button()
                    ->url(fn (StatistikTotalPenduduk $record): string => 
                        StatistikTotalPendudukResource::getUrl('edit', ['record' => $record->id]))
            ]);
    }
    


    protected function getHeaderWidgets(): array
    {
        return [
            StatistikTotalPendudukResource\Widgets\TotalPendudukOverview::class,
        ];
    }

   
    public function mount()
    {
        $this->record = StatistikTotalPenduduk::first();
    }
}
