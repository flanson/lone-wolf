<?php

namespace spec\LoneWolf;

use LoneWolf\Characteristics;
use LoneWolf\CombatSkill;
use LoneWolf\DiceResult;
use LoneWolf\Endurance;
use LoneWolf\Enemy;
use LoneWolf\Hero;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombatSpec extends ObjectBehavior
{
    function let()
    {
        $aNewEnemy = new Enemy($this->createMyNewCharacteristics());
        $aHero = new Hero($this->createMyNewCharacteristics());
        $this->beConstructedWith($aHero, $aNewEnemy);
    }

    function createMyNewCharacteristics()
    {
        $combatSkill = new CombatSkill(6);
        $endurance = new Endurance(50);
        return new Characteristics($combatSkill, $endurance);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Combat');
    }

    function it_should_allow_roll_a_dice()
    {
        $diceResult = new DiceResult(5);
        $this->rolledDice($diceResult);
    }
}
