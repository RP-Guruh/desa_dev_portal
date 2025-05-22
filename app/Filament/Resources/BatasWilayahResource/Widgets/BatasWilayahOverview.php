<?php

namespace App\Filament\Resources\BatasWilayahResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\BatasWilayah;
use Illuminate\Support\HtmlString;
class BatasWilayahOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $batasWilayah = BatasWilayah::first();
            return [
                Stat::make('Batas Utara', $batasWilayah?->batas_utara
                    ? $batasWilayah->batas_utara
                    : new HtmlString('<span style="font-style: italic; color: #6b7280;">Belum ada data</span>')
                    )
                    ->descriptionIcon('heroicon-m-map-pin')
                    ->description('Perbatasan utara desa jongjong')
                    ->color('success'),
                Stat::make('Batas Barat', $batasWilayah?->batas_barat
                    ? $batasWilayah->batas_barat
                    : new HtmlString('<span style="font-style: italic; color: #6b7280;">Belum ada data</span>')
                    )
                    ->descriptionIcon('heroicon-m-map-pin')
                    ->description('Perbatasan barat desa jongjong')
                    ->color('success'),
                Stat::make('Batas Selatan', $batasWilayah?->batas_selatan
                    ? $batasWilayah->batas_selatan
                    : new HtmlString('<span style="font-style: italic; color: #6b7280;">Belum ada data</span>')
                    )
                    ->descriptionIcon('heroicon-m-map-pin')
                    ->description('Perbatasan selatan desa jongjong')
                    ->color('success'),
                Stat::make('Batas Timur', $batasWilayah?->batas_timur
                    ? $batasWilayah->batas_timur
                    : new HtmlString('<span style="font-style: italic; color: #6b7280;">Belum ada data</span>')
                    )
                    ->descriptionIcon('heroicon-m-map-pin')
                    ->description('Perbatasan timur desa jongjong')
                    ->color('success'),
                Stat::make('Luas Wilayah', $batasWilayah?->luas_wilayah
                    ? $batasWilayah->luas_wilayah
                    : new HtmlString('<span style="font-style: italic; color: #6b7280;">Belum ada data</span>')
                    )
                    ->descriptionIcon('heroicon-m-map-pin')
                    ->description('Luas wilayah desa jongjong dalam km² (kilometer persegi)')
                    ->color('success'),
        ];
    }
}
