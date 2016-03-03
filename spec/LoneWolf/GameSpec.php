<?php

namespace spec\LoneWolf;

use LoneWolf\CombatSkill;
use LoneWolf\Endurance;
use LoneWolf\Game;
use LoneWolf\Story;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior
{
    public function createMyTestHero()
    {
        $combatSkill = new CombatSkill(5);
        $endurance = new Endurance(5);
        $this->createHero($combatSkill, $endurance);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Game');
    }

    function it_should_allow_to_create_a_new_hero()
    {
        $this->createMyTestHero();
        $this->shouldHaveAHero();
    }

    function it_should_allow_to_start_a_story()
    {
        $aStory = new Story("My new adventure");
        $this->createMyTestHero();
        $this->startStory($aStory);
        $this->shouldHaveACurrentStory();
    }

    function it_should_not_allow_to_start_a_story_with_no_player_defined()
    {
        $aStory = new Story("My new Story");
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('startStory',[$aStory]);
    }

    function it_should_allow_to_abandon_the_current_story()
    {
        $aStory = new Story("My new adventure");
        $this->createMyTestHero();
        $this->startStory($aStory);
        $this->abandon();
    }

    function it_should_not_allow_to_abandon_the_current_story_if_no_story_is_ongoing()
    {
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('abandon');
    }
    /*
        function it_can_be_initialized_with_a_player(Player $player)
        {
            $aGame = new Game($player);
            $this->initWithPlayer($player)->shouldReturn(true);
        }
    */
}
