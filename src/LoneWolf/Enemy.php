<?php

namespace LoneWolf;

class Enemy
{
    /**
     * @var Characteristics
     */
    private $characteristics;
    //@Todo add enemy name

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

    //TODO factorise with Hero
    function hit(Hit $hit)
    {
        $this->characteristics->hitEndurance($hit);
    }

    //TODO factorise with Hero
    function cure(Cure $cure)
    {
        $this->characteristics->cureEndurance($cure);
    }
}
