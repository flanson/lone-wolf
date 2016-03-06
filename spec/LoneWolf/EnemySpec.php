<?php

namespace spec\LoneWolf;

use LoneWolf\Characteristics;
use LoneWolf\CombatSkill;
use LoneWolf\Cure;
use LoneWolf\Endurance;
use LoneWolf\Hit;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnemySpec extends ObjectBehavior
{
    function let(Characteristics $characteristics)
    {
        $this->beConstructedWith($characteristics);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Enemy');
    }

    function it_should_allow_to_modify_Characteristics(Characteristics $characteristics)
    {
        $this->modifyCharacteristics($characteristics);
        //Todo check that the modification it actually worked ...
//        $aHeroToCompare = new Hero($this->createMyNewCharacteristics());
//        $this->modifyCharacteristics($this->createMyNewCharacteristics())->shouldReturn($aHeroToCompare);
    }

    //Todo add combatable ??? interface ?
    function it_should_allow_to_hit(Characteristics $characteristics, Hit $hit)
    {
        $characteristics->hitEndurance($hit)->shouldBeCalled();
        $this->hit($hit);
    }

    //Todo add combatable ??? interface ?
    function it_should_allow_to_cure(Characteristics $characteristics, Cure $cure)
    {
        $characteristics->cureEndurance($cure)->shouldBeCalled();
        $this->cure($cure);
    }

}
