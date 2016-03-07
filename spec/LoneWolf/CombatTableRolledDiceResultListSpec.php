<?php

namespace spec\LoneWolf;

use LoneWolf\CombatTableRolledDiceResult;
use LoneWolf\Hit;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombatTableRolledDiceResultListSpec extends ObjectBehavior
{
    function let()
    {
        $aHit = new Hit(5);
        $this->beConstructedWith([new CombatTableRolledDiceResult($aHit, $aHit)]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\CombatTableRolledDiceResultList');
    }

//    function it_should_not_allow_to_be_constructed_with_an_non_CombatTableRolledDiceResult()
//    {
//
//    }

//    function it_should_allow_to_get_offset()
//    {
//public bool offsetExists ( mixed $index )
//public mixed offsetGet ( mixed $index )
//    }
}
