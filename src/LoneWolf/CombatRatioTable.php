<?php

namespace LoneWolf;

class CombatRatioTable
{
    /**
     * @var CombatTableRolledDiceResultList
     */
    private $combatTableRolledDiceResultList;

    public function __construct(CombatTableRolledDiceResultList $combatTableRolledDiceResultList)
    {
        $this->combatTableRolledDiceResultList = $combatTableRolledDiceResultList;
    }

    public function rolledDice(DiceResult $diceResult)
    {
//        $combatTableRolledDiceResult = $this->combatTableRolledDiceResultList->rolledDice($diceResult);
        $heroHit = new Hit(5);
        $enemyHit = new Hit(5);
        $combatTableRolledDiceResult = new CombatTableRolledDiceResult($heroHit, $enemyHit);
        return $combatTableRolledDiceResult;
    }
}
