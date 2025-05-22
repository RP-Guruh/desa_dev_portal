<?php

namespace App\Filament\Resources\StatistikTotalPendudukResource\Pages;

use App\Filament\Resources\StatistikTotalPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatistikTotalPenduduks extends ListRecords
{
    protected static string $resource = StatistikTotalPendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
