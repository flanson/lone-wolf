<?php

namespace spec\LoneWolf;

use LoneWolf\Enemy;
use LoneWolf\Hero;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombatSpec extends ObjectBehavior
{
    function let(Hero $hero, Enemy $enemy)
    {
        $this->beConstructedWith($hero, $enemy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Combat');
    }
}
