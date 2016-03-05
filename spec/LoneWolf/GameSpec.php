<?php

namespace spec\LoneWolf;

use LoneWolf\Characteristics;
use LoneWolf\CombatSkill;
use LoneWolf\Endurance;
use LoneWolf\Game;
use LoneWolf\Hero;
use LoneWolf\Story;
use LoneWolf\Story\Destination;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior
{
    public function createMyTestHero()
    {
        $combatSkill = new CombatSkill(6);
        $endurance = new Endurance(2);
        $characteristics = new Characteristics($combatSkill, $endurance);
        return new Hero($characteristics);
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
        $this->shouldHaveType('LoneWolf\Game');
    }

    /*
     * Hero Management
     */

    function it_should_allow_to_create_a_new_hero()
    {
        $this->createHero($this->createMyTestHero());
        $this->shouldHaveAHero();
    }

    function it_should_allow_to_modify_Hero_Characteristics(Hero $hero)
    {
        $this->createHero($hero);
        $characteristics = $this->createMyNewCharacteristics();
        $hero->modifyCharacteristics($characteristics)->shouldBeCalled();
        $this->modifyHeroCharacteristics($characteristics);
    }

    function it_should_not_allow_to_modify_a_hero_characteristics_with_no_hero_defined()
    {
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('modifyHeroCharacteristics', [$this->createMyNewCharacteristics()]);
    }

//    function it_should_allow_to_modify_Hero_Endurance()
//    {
//        $this->hitHero();
//        $this->cureHero();
//    }


//    function it_should_allow_to_modify_Hero_Endurance()
//    {
//        $this->hitHero();
//        $this->cureHero();
//    }

//    function it_should_tell_when_the_all_mighty_hero_die()
//    {
//
//    }

//    function it_should_allow_to_start_a_combat_with_an_enemy()
//    {
//        $anEnemy = new //enemy
//    }
//

    /*
     * Story Management
     */

    function it_should_allow_to_start_a_story()
    {
        $this->createHero($this->createMyTestHero());
        $this->startStory($this->createMyTestStory());
        $this->shouldHaveAHeroWithACurrentStory();
    }

    function it_should_allow_a_hero_to_start_a_story(Hero $hero)
    {
        $this->createHero($hero);
        $aStory = $this->createMyTestStory();
        $hero->beginAdventure($aStory)->shouldBeCalled();
        $this->startStory($aStory);
    }

    function it_should_not_allow_to_start_a_story_with_no_hero_defined()
    {
        $aStory = new Story("My new Story");
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('startStory',[$aStory]);
    }

    function it_should_allow_to_abandon_the_current_story()
    {
        $this->createHero($this->createMyTestHero());
        $this->startStory($this->createMyTestStory());
        $this->abandon();
    }

    function it_should_allow_a_hero_to_abandon_the_current_story(Hero $hero)
    {
        $this->createHero($hero);
        $aStory = $this->createMyTestStory();
        $hero->beginAdventure($aStory)->shouldBeCalled();
        $this->startStory($aStory);
        $hero->abandonOnGoingStory()->shouldBeCalled();
        $this->abandon();
    }

    function it_should_not_allow_to_abandon_the_current_story_if_no_hero_is_defined()
    {
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('abandon');
    }

    function it_should_not_allow_to_abandon_the_current_story_if_no_story_is_ongoing()
    {
        $this->createHero($this->createMyTestHero());
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('abandon');
    }

    /*
     * Travel Management
     */

    function it_should_allow_to_travel_to_destination_when_story_is_ongoing()
    {
        $aDestination = $this->createMyTestDestination();
        $this->createHero($this->createMyTestHero());
        $this->startStory($this->createMyTestStory());
        $this->chooseDestination($aDestination);
        $this->getHeroCurrentLocation()->shouldReturn($aDestination);
    }

    function it_should_not_allow_to_travel_to_destination_when_no_story_is_ongoing()
    {
        $this->createHero($this->createMyTestHero());
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('chooseDestination', [$this->createMyTestDestination()]);
    }

    function it_should_not_allow_to_travel_to_destination_when_no_hero_is_defined()
    {
        $this->shouldThrow('LoneWolf\Exceptions\GameException')->during('chooseDestination', [$this->createMyTestDestination()]);
    }
}
