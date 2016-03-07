<?php

namespace LoneWolf;

class CombatTableRolledDiceResultList
{
    /**
     * @var array
     */
    private $combatTableRolledDiceResultList = [];

    public function __construct(array $combatTableRolledDiceResultList)
    {
        //check type of each element
//        print_r($combatTableRolledDiceResultList);
        $this->combatTableRolledDiceResultList = $combatTableRolledDiceResultList;
    }

    public function rolledDice(DiceResult $diceResult)
    {
//        print_r($diceResult->getDiceResultValue());
        return $this->combatTableRolledDiceResultList[$diceResult->getDiceResultValue()];
    }
//
//public mixed offsetGet ( mixed $index )
}
