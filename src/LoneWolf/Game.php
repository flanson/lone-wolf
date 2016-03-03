<?php

namespace LoneWolf;

use LoneWolf\Exceptions\GameException;

class Game
{
    /**
     * @var Hero
     */
    private $hero = null;
    /**
     * @var Story
     */
    private $currentStory = null;

    /**
     * @param CombatSkill $combatSkill
     * @param Endurance $endurance
     */
    public function createHero(CombatSkill $combatSkill, Endurance $endurance)
    {
        $this->hero = new Hero($combatSkill, $endurance);
    }

    /**
     * @return bool
     */
    public function hasAHero()
    {
        return ($this->hero !== null);
    }

    public function hasACurrentStory()
    {
        return ($this->currentStory !== null);
    }

    public function startStory(Story $newStory)
    {
        $this->aStoryCanOnlyStartWithAHero();
        $this->hero->beginAdventure($newStory);
        $this->currentStory = $newStory;
    }

    public function abandon()
    {
        if (!$this->hasACurrentStory()) {
            throw new GameException('You can\'t abandon an adventure if you don\'t have one');
        }
        $this->currentStory = null;
    }

    public function aStoryCanOnlyStartWithAHero()
    {
        if (!$this->hasAHero()) {
            throw new GameException('You can\'t start a Story with no hero');
        }
    }
}

