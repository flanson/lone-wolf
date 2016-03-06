<?php

namespace spec\LoneWolf;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HitSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(10);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Hit');
    }

    function it_should_not_allow_to_cure_with_a_negative_value()
    {
        $this->beConstructedWith(-5);
        $this->shouldThrow('LoneWolf\Exceptions\ConstructorException')->duringInstantiation();
    }
}
