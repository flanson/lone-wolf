<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;

class Hit
{
    /**
     * @var int
     */
    private $hitValue;

    /**
     * Hit constructor.
     * @param $hitValue
     * @throws ConstructorException
     */
    public function __construct($hitValue)
    {
        $this->aHitCantHaveANegativeValue($hitValue);
        $this->hitValue = $hitValue;
    }

    /**
     * @param $hitValue
     * @throws ConstructorException
     */
    public function aHitCantHaveANegativeValue($hitValue)
    {
        if ($hitValue < 0) {
            throw new ConstructorException('You can\'t have a negative Hit value');
        }
    }
}
