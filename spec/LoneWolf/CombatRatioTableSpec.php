<?php

namespace spec\LoneWolf;

use LoneWolf\CombatTableRolledDiceResult;
use LoneWolf\CombatTableRolledDiceResultList;
use LoneWolf\DiceResult;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombatRatioTableSpec extends ObjectBehavior
{
    function let(CombatTableRolledDiceResultList $combatTableRolledDiceResultList)
    {
        $this->beConstructedWith($combatTableRolledDiceResultList);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\CombatRatioTable');
    }

    function it_should_allow_to_roll_dice(DiceResult $diceResult)
    {
//        CombatTableRolledDiceResult $combatTableRolledDiceResult
        $this->rolledDice($diceResult);
        //->shouldReturn($combatTableRolledDiceResult);
    }
}
