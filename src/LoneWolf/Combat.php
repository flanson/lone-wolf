<?php

namespace LoneWolf;

class Combat
{
    /**
     * @var Hero
     */
    private $hero;
    /**
     * @var Enemy
     */
    private $enemy;

    public function __construct(Hero $hero, Enemy $enemy)
    {
        $this->hero = $hero;
        $this->enemy = $enemy;
    }
}
