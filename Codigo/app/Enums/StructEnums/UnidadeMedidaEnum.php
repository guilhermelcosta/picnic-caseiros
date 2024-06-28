<?php

namespace App\Enums\StructEnums;

use InvalidArgumentException;
use Illuminate\Support\Collection;

enum UnidadeMedidaEnum: int
{
    case MILIGRAMA  = 1;
    case GRAMA      = 2;
    case QUILOGRAMA = 3;
    case MILILITRO  = 4;
    case LITRO      = 5;
    case MILIMETRO  = 6;
    case CENTIMETRO = 7;
    case METRO      = 8;
    case UNIDADE    = 9;

    public function label(): string {
        return static::getLabel($this);
    }

    public function shortLabel(): string {
        return static::getShortLabel($this);
    }

    public function type(): string {
        return static::getType($this);
    }

    public function grandeza(): string {
        return static::getGrandeza($this);
    }

    public function convertTo($value, $to): string {
        return static::convert($value, $this, $to);
    }

    public static function getLabel(self $value): string {
        return match ($value) {
            UnidadeMedidaEnum::MILIGRAMA  => 'Miligrama',
            UnidadeMedidaEnum::GRAMA      => 'Grama',
            UnidadeMedidaEnum::QUILOGRAMA => 'Quilograma',
            UnidadeMedidaEnum::MILILITRO  => 'Mililitro',
            UnidadeMedidaEnum::LITRO      => 'Litro',
            UnidadeMedidaEnum::MILIMETRO  => 'Milímetro',
            UnidadeMedidaEnum::CENTIMETRO => 'Centímetro',
            UnidadeMedidaEnum::METRO      => 'Metro',
            UnidadeMedidaEnum::UNIDADE    => 'Unidade',
        };
    }

    public static function getShortLabel(self $value): string {
        return match ($value) {
            UnidadeMedidaEnum::MILIGRAMA  => 'mg',
            UnidadeMedidaEnum::GRAMA      => 'g',
            UnidadeMedidaEnum::QUILOGRAMA => 'kg',
            UnidadeMedidaEnum::MILILITRO  => 'ml',
            UnidadeMedidaEnum::LITRO      => 'l',
            UnidadeMedidaEnum::MILIMETRO  => 'mm',
            UnidadeMedidaEnum::CENTIMETRO => 'cm',
            UnidadeMedidaEnum::METRO      => 'm',
            UnidadeMedidaEnum::UNIDADE    => 'un',
        };
    }

    public static function getType(self $value): string {
        return match ($value) {
            UnidadeMedidaEnum::MILIGRAMA  => 'massa',
            UnidadeMedidaEnum::GRAMA      => 'massa',
            UnidadeMedidaEnum::QUILOGRAMA => 'massa',
            UnidadeMedidaEnum::MILILITRO  => 'volume',
            UnidadeMedidaEnum::LITRO      => 'volume',
            UnidadeMedidaEnum::MILIMETRO  => 'comprimento',
            UnidadeMedidaEnum::CENTIMETRO => 'comprimento',
            UnidadeMedidaEnum::METRO      => 'comprimento',
            UnidadeMedidaEnum::UNIDADE    => 'un',
        };
    }

    public static function getGrandeza(self $value): float {
        return match ($value) {
            UnidadeMedidaEnum::MILIGRAMA  => 0.001,
            UnidadeMedidaEnum::GRAMA      => 1,
            UnidadeMedidaEnum::QUILOGRAMA => 1000,
            UnidadeMedidaEnum::MILILITRO  => 0.001,
            UnidadeMedidaEnum::LITRO      => 1,
            UnidadeMedidaEnum::MILIMETRO  => 0.001,
            UnidadeMedidaEnum::CENTIMETRO => 0.01,
            UnidadeMedidaEnum::METRO      => 1,
            UnidadeMedidaEnum::UNIDADE    => 1,
        };
    }

    public static function convert($value, $from, $to) {
        if ($from->type() === $to->type()) {
            return $value * ($from->grandeza() / $to->grandeza());
        } else {
            throw new InvalidArgumentException("Não é possível realizar a conversão entre as unidades informadas.");

        }
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
            1 => self::MILIGRAMA,
            2 => self::GRAMA,
            3 => self::QUILOGRAMA,
            4 => self::MILILITRO,
            5 => self::LITRO,
            6 => self::MILIMETRO,
            7 => self::CENTIMETRO,
            8 => self::METRO,
            9 => self::UNIDADE,
            default => null,
        };

        return [
            'name' => $case->name,
            'value' => $case->value,
            'label' => $case->shortLabel() . ' (' . strtolower($case->label()) . ')',
        ];
    }

    public static function getUnidadeMedidaByValue($value)
    {
        return match ($value) {
            1 => self::MILIGRAMA,
            2 => self::GRAMA,
            3 => self::QUILOGRAMA,
            4 => self::MILILITRO,
            5 => self::LITRO,
            6 => self::MILIMETRO,
            7 => self::CENTIMETRO,
            8 => self::METRO,
            9 => self::UNIDADE,
            default => null,
        };
    }
}
