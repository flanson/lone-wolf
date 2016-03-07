<?php

namespace LoneWolf;

class CombatRatio
{
    private $combatRationValue;

    public function __construct($combatRationValue)
    {
        $this->combatRationValue = $combatRationValue;
    }

    /**
     * @return mixed
     */
    public function getCombatRationValue()
    {
        return $this->combatRationValue;
    }


    public function equalsTo(CombatRatio $combatRatio)
    {
        return $this->combatRationValue === $combatRatio->getCombatRationValue();
//        return $this->combatRationValue === $combatRatio->combatRationValue;
    }
}
