<?php

namespace App\Filament\Resources\StatistikTotalPendudukResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\StatistikTotalPenduduk;
class TotalPendudukOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPenduduk = StatistikTotalPenduduk::first();
        return [
            Stat::make('Jumlah Penduduk', $totalPenduduk?->jumlah_penduduk)
                ->description('Jiwa')
                ->icon('heroicon-o-user')
                ->color('success'),
            Stat::make('Laki-Laki', $totalPenduduk?->jumlah_lakilaki)
                ->description('Jiwa')
                ->icon('heroicon-o-user')
                ->color('secondary'),
            Stat::make('Perempuan', $totalPenduduk?->jumlah_perempuan)
                ->description('Jiwa')
                ->icon('heroicon-o-users')
                ->color('warning'),
            Stat::make('Kepala Keluarga', $totalPenduduk?->jumlah_kk)
                ->description('Jiwa')
                ->icon('heroicon-o-home')
                ->color('primary'),
        ];
    }
}
