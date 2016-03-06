<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;

class Cure
{
    /**
     * @var int
     */
    private $cureValue;

    /**
     * Cure constructor.
     * @param $cureValue
     * @throws ConstructorException
     */
    public function __construct($cureValue)
    {
        $this->aCureCantHaveANegativeValue($cureValue);
        $this->cureValue = $cureValue;
    }

    /**
     * @param $cureValue
     * @throws ConstructorException
     */
    public function aCureCantHaveANegativeValue($cureValue)
    {
        if ($cureValue < 0) {
            throw new ConstructorException('You can\'t have a negative Cure value');
        }
    }
}
