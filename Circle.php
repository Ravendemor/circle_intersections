<?php

use JetBrains\PhpStorm\ArrayShape;

class Circle
{
    public function __construct(public float $coordX, public float $coordY, public float $radius)
    {
    }

    #[ArrayShape([
        'x' => 'float',
        'y' => 'float',
        'r' => 'float',
    ])]
    public static function fromArray(array $coordinates): self
    {
        return new self(
            $coordinates['x'],
            $coordinates['y'],
            $coordinates['r'],
        );
    }
}
