<?php

namespace spec\LoneWolf\Story;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DestinationSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(50);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Story\Destination');
    }

    function it_should_not_allow_to_create_a_negative_or_null_destination()
    {
        $this->beConstructedWith(-6);
        $this->shouldThrow('LoneWolf\Exceptions\ConstructorException')->duringInstantiation();
    }

    function it_should_not_allow_to_create_a_null_destination()
    {
        $this->beConstructedWith(0);
        $this->shouldThrow('LoneWolf\Exceptions\ConstructorException')->duringInstantiation();
    }

    function it_should_not_allow_to_create_a_destination_over_350()
    {
        $this->beConstructedWith(351);
        $this->shouldThrow('LoneWolf\Exceptions\ConstructorException')->duringInstantiation();
    }
}
