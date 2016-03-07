<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;

class Characteristics
{
    /**
     * @var CombatSkill
     */
    private $combatSkill;
    /**
     * @var Endurance
     */
    private $endurance;

    /**
     * Hero constructor.
     * @param CombatSkill $combatSkill
     * @param Endurance $endurance
     * @throws ConstructorException
     */
    public function __construct(CombatSkill $combatSkill, Endurance $endurance)
    {
        $this->aNewCharacteristicsCantHaveANegativeEndurance($endurance);
        $this->combatSkill = $combatSkill;
        $this->endurance = $endurance;
    }

    function hitEndurance(Hit $hit)
    {
        $this->endurance->hit($hit);
    }

    function cureEndurance(Cure $cure)
    {
        $this->endurance->cure($cure);
    }


    public function compareCombatSkillTo(Characteristics $characteristics)
    {
        return $this->combatSkill->compareTo($characteristics->combatSkill);
    }
    /**
     * @param Endurance $endurance
     * @throws ConstructorException
     */
    public function aNewCharacteristicsCantHaveANegativeEndurance(Endurance $endurance)
    {
        if ($endurance->isNegative()) {
            throw new ConstructorException('You can\'t have a negative CombatSkill value');
        }
    }
}
