<?php

namespace spec\LoneWolf;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnduranceSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(5);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Endurance');
    }

    function it_should_allow_negative_value()
    {
        $this->beConstructedWith(-5);
        $this->shouldBeNegative();
    }

//    function it_should_allow_to_add()
//    {
//
//    }

//    function it_should_allow_to_remove()
//    {
//
//    }
}
