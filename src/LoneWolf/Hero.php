<?php

namespace LoneWolf;

use LoneWolf\Exceptions\GameException;
use LoneWolf\Story\Destination;

class Hero
{
    /**
     * @var Characteristics
     */
    private $characteristics;

    /**
     * @var Story
     */
    private $currentStory = null;
    /**
     * @var Destination
     */
    private $currentLocation = null;

    /**
     * Hero constructor.
     * @param Characteristics $characteristics
     */
    public function __construct(Characteristics $characteristics)
    {
        $this->characteristics = $characteristics;
    }

    /*
     * Characteristics management
     */

    public function modifyCharacteristics(Characteristics $characteristics)
    {
        $this->characteristics = $characteristics;
        return $this;
    }

    //TODO factorise with Enemy
    function hit(Hit $hit)
    {
        $this->characteristics->hitEndurance($hit);
    }

    //TODO factorise with Enemy
    function cure(Cure $cure)
    {
        $this->characteristics->cureEndurance($cure);
    }

    public function compareCombatRatio(Enemy $enemy)
    {
        return $this->characteristics->compareCombatSkillTo($enemy->getCharacteristics());
    }

    /*
     * Story
     */

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

    public function travelTo(Destination $newDestination)
    {
        $this->aHeroCantTravelWhenNoStoryIsOngoing();
        $this->currentLocation = $newDestination;
    }

//    public function __toString()
//    {
//
//    }

    /*
     * Get info from Hero
     */

    //@todo tell, don't ask => should be private
    public function hasACurrentStory()
    {
        return ($this->currentStory !== null);
    }

    //@todo tell, don't ask => should be private
    public function getCurrentLocation()
    {
        if (!$this->hasACurrentStory()) {
            //@Todo return destinationNowhere
            return null;
        }
        return $this->currentLocation;
    }

    /*
     * Spec of Hero
     */

    private function aHeroCanOnlyHaveOneOngoingAdventure()
    {
        if ($this->hasACurrentStory()) {
            throw new GameException('You can\'t start a new adventure if you haven\'t finish your current one');
        }
    }

    private function aHeroCantAbandonWhenNoStoryHasBegun()
    {
        if (!$this->hasACurrentStory()) {
            throw new GameException('You can\'t abandon an adventure if you don\'t have one');
        }
    }

    private function aHeroCantTravelWhenNoStoryIsOngoing()
    {
        if (!$this->hasACurrentStory()) {
            throw new GameException('You can\'t wanderer anywhere you want when you have no story ongoing');
        }
    }
}
