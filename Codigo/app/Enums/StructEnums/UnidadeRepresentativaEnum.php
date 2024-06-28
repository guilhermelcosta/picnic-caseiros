<?php

namespace App\Enums\StructEnums;

use InvalidArgumentException;
use Illuminate\Support\Collection;

enum UnidadeRepresentativaEnum: int
{
    case UNITARIO     = 1;
    case REAL         = 2;
    case PORCENTAGEM  = 3;

    public function label(): string {
        return static::getLabel($this);
    }

    public function shortLabel(): string {
        return static::getShortLabel($this);
    }

    public static function getLabel(self $value): string {
        return match ($value) {
            UnidadeRepresentativaEnum::UNITARIO => 'Unitário',
            UnidadeRepresentativaEnum::REAL => 'Real',
            UnidadeRepresentativaEnum::PORCENTAGEM => 'Porcentagem',
        };
    }

    public static function getShortLabel(self $value): string {
        return match ($value) {
            UnidadeRepresentativaEnum::UNITARIO => 'un.',
            UnidadeRepresentativaEnum::REAL => 'R$',
            UnidadeRepresentativaEnum::PORCENTAGEM => '%',
        };
    }

    public static function getOptions(): collection {
        return collect(array_map(fn($value) => [
            'name' => $value->name,
            'value' => $value->value,
            'label' => $value->shortLabel() . ' (' . strtolower($value->label()) . ')',
        ], self::cases()));
    }

    public static function getOptionByValue(int $value)
    {
        $case = match ($value) {
            1 => self::UNITARIO,
            2 => self::REAL,
            3 => self::PORCENTAGEM,
            default => null,
        };

        return [
            'name' => $case->name,
            'value' => $case->value,
            'label' => $case->shortLabel() . ' (' . strtolower($case->label()) . ')',
        ];
    }
}
