<?php

namespace spec\LoneWolf;

use LoneWolf\CombatSkill;
use LoneWolf\Endurance;
use LoneWolf\Story;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HeroSpec extends ObjectBehavior
{
    function let()
    {
        $combatSkill = new CombatSkill(6);
        $endurance = new Endurance(2);
        $this->beConstructedWith($combatSkill, $endurance);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Hero');
    }

    function it_should_not_allow_to_create_a_hero_with_a_negative_endurance()
    {
        $combatSkill = new CombatSkill(6);
        $negativeEndurance = new Endurance(-4);
        $this->beConstructedWith($combatSkill, $negativeEndurance);
        $this->shouldThrow('LoneWolf\Exceptions\ConstructorException')->duringInstantiation();
    }

    function it_should_allow_to_begin_an_adventure()
    {
        $aStory = new Story("My new adventure");
        $this->beginAdventure($aStory);
        $this->shouldHaveACurrentStory();
    }

    function it_should_allow_to_abandon_the_current_story()
    {
        $aStory = new Story("My new adventure");
        $this->beginAdventure($aStory);
        $this->abandonOnGoingStory();
        $this->shouldNotHaveACurrentStory();
    }

    function it_should_not_allow_to_abandon_the_current_story_if_no_story_is_ongoing()
    {
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('abandonOnGoingStory');
    }

    function it_should_not_allow_to_start_a_story_with_a_story_still_ongoing()
    {
        $aStory = new Story("My current adventure");
        $this->beginAdventure($aStory);
        $anOtherStory = new Story("My new adventure");
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('beginAdventure', [$anOtherStory]);
    }
}
