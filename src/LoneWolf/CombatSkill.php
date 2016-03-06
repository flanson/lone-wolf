<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;

class CombatSkill
{
    /**
     * @var int
     */
    private $combatSkillValue;

    /**
     * CombatSkill constructor.
     * @param int $combatSkillValue
     * @throws ConstructorException
     */
    public function __construct($combatSkillValue)
    {
        $this->aCombatSkillCantHaveANegativeValue($combatSkillValue);
        $this->combatSkillValue = $combatSkillValue;
    }

    /**
     * @param $combatSkillValue
     * @throws ConstructorException
     */
    public function aCombatSkillCantHaveANegativeValue($combatSkillValue)
    {
        if ($combatSkillValue < 0) {
            throw new ConstructorException('You can\'t have a negative CombatSkill value');
        }
    }
}
