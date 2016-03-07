<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;
use LoneWolf\Exceptions\HeroDeadException;

class Endurance
{
    /**
     * @var int
     */
    private $enduranceValue;
    private $enduranceMaxValue;

    /**
     * CombatSkill constructor.
     * @param int $enduranceValue
     * @throws ConstructorException
     */
    public function __construct($enduranceValue)
    {
//        if ($enduranceValue < 0) {
//            throw new ConstructorException('You can\'t have a negative endurance value');
//        }
        $this->enduranceValue = $enduranceValue;
        $this->enduranceMaxValue = $enduranceValue;
    }

    function hit(Hit $hit)
    {
        $this->enduranceValue = $this->enduranceValue - $hit->getHitValue();
        if ($this->isNegative()) {
            throw new HeroDeadException('Here / Enemy is Dead');
        }
    }

    function cure(Cure $cure)
    {
        $this->enduranceValue = $this->enduranceValue + $cure->getCureValue();
        if ($this->enduranceValue > $this->enduranceMaxValue) {
            $this->enduranceValue = $this->enduranceMaxValue;
        }
    }

    /**
     * @return bool
     */
    public function isNegative()
    {
        return ($this->enduranceValue < 0);
    }

    //combine
}
