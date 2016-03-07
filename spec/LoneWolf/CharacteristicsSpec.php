<?php

namespace spec\LoneWolf;

use LoneWolf\Characteristics;
use LoneWolf\CombatRatio;
use LoneWolf\CombatSkill;
use LoneWolf\Cure;
use LoneWolf\Endurance;
use LoneWolf\Hit;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CharacteristicsSpec extends ObjectBehavior
{
    function let()
    {
        $combatSkill = new CombatSkill(6);
        $endurance = new Endurance(20);
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

    function it_should_allow_to_hit()
    {
        $aHit = new Hit(5);
        $this->hitEndurance($aHit);
    }

    function it_should_allow_to_cure()
    {
        $aCure = new Cure(10);
        $this->cureEndurance($aCure);
    }

    //Todo create more example
    function it_should_allow_to_compare_to_an_other_com()
    {
        $combatSkill = new CombatSkill(12);
        $endurance = new Endurance(2);
        $anOtherCharacteristics = new Characteristics($combatSkill, $endurance);
        $combatRatio = new CombatRatio(-6);
        $this->compareCombatSkillTo($anOtherCharacteristics)->shouldEqualTo($combatRatio);
    }

    public function getMatchers()
    {
        return [
            'equalTo' => function ($subject, $key) {
//                throw new FailureException(sprintf(
//                    'Message with subject "%s" and key "%s".',
//                    $subject, $key
//                ));
                return $subject->equalsTo($key);
            },
        ];
    }
}
