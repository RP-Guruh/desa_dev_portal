<?php

namespace App\Enums;

enum AgamaEnum: string
{
    case ISLAM = 'Islam';
    case KRISTEN_PROTESTAN = 'Kristen Protestan';
    case KRISTEN_KATOLIK = 'Kristen Katolik';
    case HINDU = 'Hindu';
    case BUDDHA = 'Buddha';
    case KONGHUCU = 'Konghucu';
    case KEPERCAYAAN_LAINNYA = 'Kepercayaan Lainnya';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }


    public function label(): string
    {
        return $this->value;
    }

    public static function cariNamaAgama(string $name): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }
        return null;
    }
}
