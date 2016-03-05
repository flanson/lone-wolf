<?php

namespace spec\LoneWolf;

use LoneWolf\CombatSkill;
use LoneWolf\Endurance;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CharacteristicsSpec extends ObjectBehavior
{
    function let()
    {
        $combatSkill = new CombatSkill(6);
        $endurance = new Endurance(2);
        $this->beConstructedWith($combatSkill, $endurance);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Characteristics');
    }

    function it_should_not_allow_to_create_a_characteristics_with_a_negative_endurance()
    {
        $combatSkill = new CombatSkill(6);
        $negativeEndurance = new Endurance(-4);
        $this->beConstructedWith($combatSkill, $negativeEndurance);
        $this->shouldThrow('LoneWolf\Exceptions\ConstructorException')->duringInstantiation();
    }

}
