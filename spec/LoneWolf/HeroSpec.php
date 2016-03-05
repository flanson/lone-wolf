<?php

namespace spec\LoneWolf;

use LoneWolf\Characteristics;
use LoneWolf\CombatSkill;
use LoneWolf\Endurance;
use LoneWolf\Hero;
use LoneWolf\Story;
use LoneWolf\Story\Destination;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HeroSpec extends ObjectBehavior
{
    function let()
    {
        $combatSkill = new CombatSkill(6);
        $endurance = new Endurance(2);
        $characteristics = new Characteristics($combatSkill, $endurance);
        $this->beConstructedWith($characteristics);
    }

    public function createMyTestStory()
    {
        return new Story("My new adventure");
    }

    public function createMyTestDestination()
    {
        return new Destination(42);
    }

    public function createMyNewCharacteristics()
    {
        $combatSkill = new CombatSkill(20);
        $endurance = new Endurance(10);
        return new Characteristics($combatSkill, $endurance);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LoneWolf\Hero');
    }

    function it_should_allow_to_begin_an_adventure()
    {
        $this->beginAdventure($this->createMyTestStory());
        $this->shouldHaveACurrentStory();
    }

    function it_should_allow_to_abandon_the_current_story()
    {
        $this->beginAdventure($this->createMyTestStory());
        $this->abandonOnGoingStory();
        $this->shouldNotHaveACurrentStory();
    }

    function it_should_not_allow_to_abandon_the_current_story_if_no_story_is_ongoing()
    {
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('abandonOnGoingStory');
    }

    function it_should_not_allow_to_start_a_story_with_a_story_still_ongoing()
    {
        $this->beginAdventure($this->createMyTestStory());
        $anOtherStory = new Story("My new adventure");
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('beginAdventure', [$anOtherStory]);
    }

    function it_should_allow_to_travel_to_destination_when_story_is_ongoing()
    {
        $aDestination = $this->createMyTestDestination();
        $this->beginAdventure($this->createMyTestStory());
        $this->travelTo($aDestination);
        $this->getCurrentLocation()->shouldReturn($aDestination);
    }

    function it_should_allow_to_modify_Characteristics()
    {
        $this->modifyCharacteristics($this->createMyNewCharacteristics());
        //Todo check that the modification it actually worked ...
//        $aHeroToCompare = new Hero($this->createMyNewCharacteristics());
//        $this->modifyCharacteristics($this->createMyNewCharacteristics())->shouldReturn($aHeroToCompare);
    }

}
