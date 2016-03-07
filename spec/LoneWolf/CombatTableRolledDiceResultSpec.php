<?php

namespace spec\LoneWolf;

use LoneWolf\Enemy;
use LoneWolf\Hero;
use LoneWolf\Hit;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CombatTableRolledDiceResultSpec extends ObjectBehavior
{
    function let(Hit $heroHit, Hit $enemyHit)
    {
        $this->beConstructedWith($heroHit, $enemyHit);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\CombatTableRolledDiceResult');
    }

    function it_should_allow_to_hit_enemy(Enemy $enemy, Hit $enemyHit)
    {
        $enemy->hit($enemyHit)->shouldBeCalled();
        $this->hitEnemy($enemy);
    }

    function it_should_allow_to_hit_hero(Hero $hero, Hit $heroHit)
    {
        $hero->hit($heroHit)->shouldBeCalled();
        $this->hitHero($hero);
    }
}
