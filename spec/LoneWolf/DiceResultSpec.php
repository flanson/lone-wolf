<?php

namespace spec\LoneWolf;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DiceResultSpec extends ObjectBehavior
{
    const CONSTRUCTOR_EXCEPTION_NAME = 'LoneWolf\Exceptions\ConstructorException';

    function let()
    {
        $this->beConstructedWith(5);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\DiceResult');
    }

    function it_should_not_allow_a_value_over_9()
    {
        $this->beConstructedWith(10);
        $this->shouldThrow(self::CONSTRUCTOR_EXCEPTION_NAME)->duringInstantiation();
    }

    function it_should_not_allow_a_negative_value()
    {
        $this->beConstructedWith(-1);
        $this->shouldThrow(self::CONSTRUCTOR_EXCEPTION_NAME)->duringInstantiation();
    }
}
