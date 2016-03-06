<?php

namespace spec\LoneWolf;

use LoneWolf\Characteristics;
use LoneWolf\CombatSkill;
use LoneWolf\Cure;
use LoneWolf\Endurance;
use LoneWolf\Hero;
use LoneWolf\Hit;
use LoneWolf\Story;
use LoneWolf\Story\Destination;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HeroSpec extends ObjectBehavior
{
    function let(Characteristics $characteristics)
    {
        $this->beConstructedWith($characteristics);
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

    /*
     * Characteristics Management
     */

    function it_should_allow_to_modify_Characteristics()
    {
        $this->modifyCharacteristics($this->createMyNewCharacteristics());
        //Todo check that the modification it actually worked ...
//        $aHeroToCompare = new Hero($this->createMyNewCharacteristics());
//        $this->modifyCharacteristics($this->createMyNewCharacteristics())->shouldReturn($aHeroToCompare);
    }

    function it_should_allow_to_hit(Characteristics $characteristics, Hit $hit)
    {
        $characteristics->hitEndurance($hit)->shouldBeCalled();
        $this->hit($hit);
    }

    function it_should_allow_to_cure(Characteristics $characteristics, Cure $cure)
    {
        $characteristics->cureEndurance($cure)->shouldBeCalled();
        $this->cure($cure);
    }

    /*
     * Story Management
     */

    function it_should_allow_to_begin_an_adventure(Story $story)
    {
        $this->beginAdventure($story);
        $this->shouldHaveACurrentStory();
    }

    function it_should_allow_to_abandon_the_current_story(Story $story)
    {
        $this->beginAdventure($story);
        $this->abandonOnGoingStory();
        $this->shouldNotHaveACurrentStory();
    }

    function it_should_not_allow_to_abandon_the_current_story_if_no_story_is_ongoing()
    {
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('abandonOnGoingStory');
    }

    function it_should_not_allow_to_start_a_story_with_a_story_still_ongoing(Story $story)
    {
        $this->beginAdventure($story);
        $anOtherStory = new Story("My new adventure");
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('beginAdventure', [$anOtherStory]);
    }

    function it_should_allow_to_travel_to_destination_when_story_is_ongoing(Story $story, Destination $destination)
    {
        $this->beginAdventure($story);
        $this->travelTo($destination);
        $this->getCurrentLocation()->shouldReturn($destination);
    }

}
