<?php

namespace spec\LoneWolf;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombatSkillSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(5);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\CombatSkill');
    }

    function it_should_not_allow_negative_value()
    {
        $this->beConstructedWith(-5);
        $this->shouldThrow('LoneWolf\Exceptions\ConstructorException')->duringInstantiation();
    }
}
