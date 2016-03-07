<?php

namespace spec\LoneWolf;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombatRatioSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(5);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\CombatRatio');
    }

}
