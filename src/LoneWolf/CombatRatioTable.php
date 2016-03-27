<?php

namespace LoneWolf;

/**
 * Class CombatRatioTable
 * @package LoneWolf
 */
class CombatRatioTable
{
    /**
     * @var CombatTableRolledDiceResultList
     */
    private $combatTableRolledDiceResultList;

    /**
     * CombatRatioTable constructor.
     * @param CombatTableRolledDiceResultList $combatTableRolledDiceResultList
     */
    public function __construct(CombatTableRolledDiceResultList $combatTableRolledDiceResultList)
    {
        $this->combatTableRolledDiceResultList = $combatTableRolledDiceResultList;
    }

    /**
     * @param DiceResult $diceResult
     * @return CombatTableRolledDiceResult
     */
    public function rolledDice(DiceResult $diceResult)
    {
        $combatTableRolledDiceResult = $this->combatTableRolledDiceResultList->rolledDice($diceResult);
        return $combatTableRolledDiceResult;
    }
}
