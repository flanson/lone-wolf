<?php

namespace spec\LoneWolf;

use LoneWolf\CombatRatio;
use LoneWolf\CombatSkill;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombatSkillSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(28);
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

    function it_should_allow_to_compare_to_an_other_com()
    {
        $combatRatio = new CombatRatio(5);
        $anOtherCombatSkill = new CombatSkill(23);
        $this->compareTo($anOtherCombatSkill)->shouldEqualTo($combatRatio);
    }
    //Todo add test with combat ratio difference greater than 11

    public function getMatchers()
    {
        return [
            'equalTo' => function ($subject, $key) {
                return $subject->equalsTo($key);
            },
        ];
    }
}
