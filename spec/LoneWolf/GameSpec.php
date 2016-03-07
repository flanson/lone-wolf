<?php

namespace spec\LoneWolf;

use LoneWolf\Characteristics;
use LoneWolf\Combat;
use LoneWolf\CombatSkill;
use LoneWolf\Cure;
use LoneWolf\DiceResult;
use LoneWolf\Endurance;
use LoneWolf\Enemy;
use LoneWolf\Exceptions\EnemyDeadException;
use LoneWolf\Exceptions\HeroDeadException;
use LoneWolf\Game;
use LoneWolf\Hero;
use LoneWolf\Hit;
use LoneWolf\Story;
use LoneWolf\Story\Destination;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior
{
    const GAME_EXCEPTION_NAME = 'LoneWolf\Exceptions\GameException';

    /*
     * Tools functions
     */

    public function createMyTestHero()
    {
        $combatSkill = new CombatSkill(6);
        $endurance = new Endurance(52);
        $characteristics = new Characteristics($combatSkill, $endurance);
        return new Hero($characteristics);
    }

    public function createMyTestEnemy()
    {
        $combatSkill = new CombatSkill(6);
        $endurance = new Endurance(42);
        $characteristics = new Characteristics($combatSkill, $endurance);
        return new Enemy($characteristics);
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
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('modifyHeroCharacteristics', [$this->createMyNewCharacteristics()]);
    }

    function it_should_allow_to_hit_Hero(Hero $hero, Hit $hit)
    {
        $this->createHero($hero);
        $hero->hit($hit)->shouldBeCalled();
        $this->hitHero($hit);
    }

    function it_should_not_allow_to_hit_a_hero_if_non_defined(Hit $hit)
    {
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('hitHero', [$hit]);
    }

    function it_should_allow_to_cure_Hero(Hero $hero, Cure $cure)
    {
        $this->createHero($hero);
        $hero->cure($cure)->shouldBeCalled();
        $this->cureHero($cure);
    }

    function it_should_not_allow_to_cure_a_hero_if_non_defined(Cure $cure)
    {
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('cureHero', [$cure]);
    }

//    function it_should_tell_when_the_all_mighty_hero_die()
//    {
//
//    }

    /*
     * Combat Management
     */

    function it_should_allow_to_start_a_combat_with_an_enemy()
    {
        $this->createHero($this->createMyTestHero());
        $this->startCombat($this->createMyTestEnemy());
    }

    function it_should_not_allow_to_start_a_combat_when_one_is_already_ongoing()
    {
        $this->createHero($this->createMyTestHero());
        $this->startCombat($this->createMyTestEnemy());
        $aNewEnemy = new Enemy($this->createMyNewCharacteristics());
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('startCombat', [$aNewEnemy]);
    }

    function it_should_not_allow_to_start_a_combat_with_an_enemy_with_no_hero(Enemy $enemy)
    {
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('startCombat', [$enemy]);
    }

    //@TODO how to check ?
    function it_should_allow_to_abandon_a_combat()
    {
        $this->createHero($this->createMyTestHero());
        $this->startCombat($this->createMyTestEnemy());
        $this->abandonCombat();
    }

    function it_should_not_allow_to_end_a_combat_when_no_combat_has_begun()
    {
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('abandonCombat');
    }

    //cant_start_a_combat_outside_an_adventure

    /*
     * Story Management
     */

    //@Todo : to remove .?!
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
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('startStory',[$aStory]);
    }

    function it_should_allow_to_abandon_the_current_story()
    {
        $this->createHero($this->createMyTestHero());
        $this->startStory($this->createMyTestStory());
        $this->abandonStory();
    }

    function it_should_allow_a_hero_to_abandon_the_current_story(Hero $hero)
    {
        $this->createHero($hero);
        $aStory = $this->createMyTestStory();
        $hero->beginAdventure($aStory)->shouldBeCalled();
        $this->startStory($aStory);
        $hero->abandonOnGoingStory()->shouldBeCalled();
        $this->abandonStory();
    }

    function it_should_not_allow_to_abandon_the_current_story_if_no_hero_is_defined()
    {
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('abandonStory');
    }

    /*
     * Travel Management
     */

    //@Todo : change test, it should test the interaction with the hero instead of reading info from hero
    function it_should_allow_to_travel_to_destination_when_story_is_ongoing()
    {
        $aDestination = $this->createMyTestDestination();
        $this->createHero($this->createMyTestHero());
        $this->startStory($this->createMyTestStory());
        $this->chooseDestination($aDestination);
        $this->getHeroCurrentLocation()->shouldReturn($aDestination);
    }

    //@Todo to remove this is the responsability of the hero
    function it_should_not_allow_to_travel_to_destination_when_no_story_is_ongoing()
    {
        $this->createHero($this->createMyTestHero());
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('chooseDestination', [$this->createMyTestDestination()]);
    }

    function it_should_not_allow_to_travel_to_destination_when_no_hero_is_defined()
    {
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('chooseDestination', [$this->createMyTestDestination()]);
    }

    function it_should_not_allow_to_travel_to_destination_when_the_hero_is_in_a_combat(Story $story, Destination $destination)
    {
        $this->createHero($this->createMyTestHero());
        $this->startStory($story);
        $this->startCombat($this->createMyTestEnemy());
        $this->shouldThrow(self::GAME_EXCEPTION_NAME)->during('chooseDestination', [$destination]);
    }


    function it_should_play()
    {
        $this->createHero($this->createMyTestHero());
        $this->startStory($this->createMyTestStory());
        $this->chooseDestination($this->createMyTestDestination());
        $this->chooseDestination($this->createMyTestDestination());
        $this->chooseDestination($this->createMyTestDestination());
        $combat = $this->startCombat($this->createMyTestEnemy());
        try {
            $combat->rolledDice(new DiceResult(5));
            $combat->rolledDice(new DiceResult(7));
            $combat->rolledDice(new DiceResult(1));
            $combat->rolledDice(new DiceResult(0));
            $combat->rolledDice(new DiceResult(9));
        } catch (EnemyDeadException $e) {
//            send to combat win page....
        } catch (HeroDeadException $e) {
//            send to die page....
        } finally {
            $this->abandonCombat();
        }
        $this->chooseDestination(new Destination(350));
    }
}
