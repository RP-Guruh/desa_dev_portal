<?php

namespace App\Enums;

enum PendidikanEnum: string
{
    case TIDAK_BELUM_SEKOLAH = 'Tidak/Belum Sekolah';
    case BELUM_TAMAT_SD = 'Belum Tamat SD/Sederajat';
    case TAMAT_SD = 'Tamat SD/Sederajat';
    case SMP = 'SMP/Sederajat';
    case SMA = 'SMA/Sederajat';
    case DIPLOMA_I_II = 'Diploma I/II';
    case DIPLOMA_III = 'Diploma III/Sarjana Muda';
    case DIPLOMA_IV_STRATA_I = 'Diploma IV/Strata I';
    case STRATA_II = 'Strata II';
    case STRATA_III = 'Strata III';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }


    public function label(): string
    {
        return $this->value;
    }

    public static function cariNamaPendidikan(string $name): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }
        return null;
    }

}
