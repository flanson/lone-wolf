<?php

namespace LoneWolf;

use LoneWolf\Exceptions\GameException;
use LoneWolf\Story\Destination;

/**
 * Class Hero
 * @package LoneWolf
 */
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

    /**
     * @return int
     */
    public function getLife()
    {
        return $this->characteristics->getLife();
    }

    /*
     * Characteristics management
     */

    /**
     * @param Characteristics $characteristics
     * @return $this
     */
    public function modifyCharacteristics(Characteristics $characteristics)
    {
        $this->characteristics = $characteristics;
        return $this;
    }

    //TODO factorise with Enemy
    /**
     * @param Hit $hit
     */
    public function hit(Hit $hit)
    {
        $this->characteristics->hitEndurance($hit);
    }

    //TODO factorise with Enemy
    /**
     * @param Cure $cure
     */
    public function cure(Cure $cure)
    {
        $this->characteristics->cureEndurance($cure);
    }

    /**
     * @param Enemy $enemy
     * @return CombatRatio
     */
    public function compareCombatRatio(Enemy $enemy)
    {
        return $this->characteristics->compareCombatSkillTo($enemy->getCharacteristics());
    }

    /*
     * Story
     */

    /**
     * @param Story $story
     * @throws GameException
     */
    public function beginAdventure(Story $story)
    {
        $this->aHeroCanOnlyHaveOneOngoingAdventure();
        $this->currentStory = $story;
    }

    /**
     * @throws GameException
     */
    public function abandonOnGoingStory()
    {
        $this->aHeroCantAbandonWhenNoStoryHasBegun();
        $this->currentStory = null;
    }

    /**
     * @param Destination $newDestination
     * @throws GameException
     */
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
    /**
     * @return bool
     */
    public function hasACurrentStory()
    {
        return ($this->currentStory !== null);
    }

    //@todo tell, don't ask => should be private
    /**
     * @return Destination|null
     */
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

    /**
     * @throws GameException
     */
    private function aHeroCanOnlyHaveOneOngoingAdventure()
    {
        if ($this->hasACurrentStory()) {
            throw new GameException('You can\'t start a new adventure if you haven\'t finish your current one');
        }
    }

    /**
     * @throws GameException
     */
    private function aHeroCantAbandonWhenNoStoryHasBegun()
    {
        if (!$this->hasACurrentStory()) {
            throw new GameException('You can\'t abandon an adventure if you don\'t have one');
        }
    }

    /**
     * @throws GameException
     */
    private function aHeroCantTravelWhenNoStoryIsOngoing()
    {
        if (!$this->hasACurrentStory()) {
            throw new GameException('You can\'t wanderer anywhere you want when you have no story ongoing');
        }
    }
}
