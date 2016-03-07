<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;

class DiceResult
{
    /**
     * @var int
     */
    private $diceResultValue;

    public function __construct($diceResultValue)
    {
        $this->aRolledDiceValueIsBetween0And9($diceResultValue);
        $this->diceResultValue = $diceResultValue;
    }

    /**
     * @return int
     */
    public function getDiceResultValue()
    {
        return $this->diceResultValue;
    }

    public function aRolledDiceValueIsBetween0And9($diceResultValue)
    {
        if ($diceResultValue < 0 || $diceResultValue > 9) {
            throw new ConstructorException('A dice result is only between 0 and 9');
        }
    }
}
