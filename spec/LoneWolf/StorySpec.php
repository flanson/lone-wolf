<?php

namespace spec\LoneWolf;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith("My new Story");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Story');
    }

    function it_should_have_a_non_empty_name()
    {
        $this->beConstructedWith('');
        $this->shouldThrow('LoneWolf\Exceptions\ConstructorException')->duringInstantiation();
    }
}
