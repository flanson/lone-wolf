<?php

namespace LoneWolf;

use LoneWolf\Exceptions\GameException;
use LoneWolf\Story\Destination;

class Game
{
    /**
     * @var Hero
     */
    private $hero = null;

    /**
     * @param Hero $hero
     */
    public function createHero(Hero $hero)
    {
        $this->hero = $hero;
    }

    public function modifyHeroCharacteristics(Characteristics $characteristics)
    {
        if (!$this->hasAHero()) {
            throw new GameException('You can\'t modify the characteristics of a hero you don\'t have');
        }
        $this->hero->modifyCharacteristics($characteristics);
    }

    public function startStory(Story $newStory)
    {
        $this->aStoryCanOnlyStartWithAHero();
        $this->hero->beginAdventure($newStory);
    }

    public function abandon()
    {
        if (!$this->hasAHero()) {
            throw new GameException('You can\'t abandon an adventure if you don\'t have a hero');
        }
        $this->hero->abandonOnGoingStory();
    }

    public function chooseDestination(Destination $destination)
    {
        if (!$this->hasAHero()) {
            throw new GameException('You can\'t wanderer anywhere you want when you have no hero');
        }
        $this->hero->travelTo($destination);
    }

    /**
     * @return bool
     */
    //@todo tell, don't ask => should be private
    public function hasAHero()
    {
        return ($this->hero !== null);
    }

    //@TODO to remove : the game should not ask (this can be remove
    // if the test only check interaction between Game and Hero and not the hero info)
    public function hasAHeroWithACurrentStory()
    {
        if (!$this->hasAHero()) {
            return false;
        }
        return $this->hero->hasACurrentStory();
    }

    //@todo tell, don't ask => should be private
    public function getHeroCurrentLocation()
    {
        if (!$this->hasAHero()) {
            throw new GameException('You can\'t wanderer anywhere you want when you have no hero');
        }
        return $this->hero->getCurrentLocation();
    }

    private function aStoryCanOnlyStartWithAHero()
    {
        if (!$this->hasAHero()) {
            throw new GameException('You can\'t start a Story with no hero');
        }
    }
}

