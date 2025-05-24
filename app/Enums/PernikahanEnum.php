<?php

namespace App\Enums;

enum PernikahanEnum: string
{
    case BELUM_KAWIN = 'Belum Kawin';
    case KAWIN = 'Kawin';
    case CERAI_HIDUP = 'Cerai Hidup';
    case CERAI_MATI = 'Cerai Mati';
    case KWAIN_TERCATAT = 'Kawin Tercatat';
    case KAWIN_TIDAK_TERCATAT = 'Kawin Tidak Tercatat';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }


    public function label(): string
    {
        return $this->value;
    }

    public static function cariNamaPernikahan(string $name): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }
        return null;
    }

}
