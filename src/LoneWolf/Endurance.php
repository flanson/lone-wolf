<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;

class Endurance
{
    /**
     * @var int
     */
    private $combatSkillValue;

    /**
     * CombatSkill constructor.
     * @param int $enduranceValue
     * @throws ConstructorException
     */
    public function __construct($enduranceValue)
    {
//        if ($enduranceValue < 0) {
//            throw new ConstructorException('You can\'t have a negative endurance value');
//        }
        $this->combatSkillValue = $enduranceValue;
    }

    /**
     * @return bool
     */
    public function isNegative()
    {
        return ($this->combatSkillValue < 0);
    }

    //combine
}
