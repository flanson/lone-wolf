<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;
use LoneWolf\Exceptions\GameException;

class Hero
{
    /**
     * @var CombatSkill
     */
    private $combatSkill;
    /**
     * @var Endurance
     */
    private $endurance;
    /**
     * @var Story
     */
    private $currentStory = null;

    /**
     * Hero constructor.
     * @param CombatSkill $combatSkill
     * @param Endurance $endurance
     * @throws ConstructorException
     */
    public function __construct(CombatSkill $combatSkill, Endurance $endurance)
    {
        if ($endurance->isNegative()) {
            throw new ConstructorException('You can\'t have a negative CombatSkill value');
        }
        $this->combatSkill = $combatSkill;
        $this->endurance = $endurance;
    }

    public function beginAdventure(Story $story)
    {
        $this->aHeroCanOnlyHaveOneOngoingAdventure();
        $this->currentStory = $story;
    }

    public function abandonOnGoingStory()
    {
        $this->aHeroCantAbandonWhenNoStoryHasBegun();
        $this->currentStory = null;
    }

    public function hasACurrentStory()
    {
        return ($this->currentStory !== null);
    }

    public function aHeroCanOnlyHaveOneOngoingAdventure()
    {
        if ($this->hasACurrentStory()) {
            throw new GameException('You can\'t start a new adventure if you haven\'t finish your current one');
        }
    }

    public function aHeroCantAbandonWhenNoStoryHasBegun()
    {
        if (!$this->hasACurrentStory()) {
            throw new GameException('You can\'t abandon an adventure if you don\'t have one');
        }
    }
}
