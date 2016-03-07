<?php
namespace LoneWolf;

class CombatTableRolledDiceResult
{
    /**
     * @var Hit
     */
    private $heroHit;
    /**
     * @var Hit
     */
    private $enemyHit;

    public function __construct(Hit $heroHit, Hit $enemyHit)
    {
        $this->heroHit = $heroHit;
        $this->enemyHit = $enemyHit;
    }

    public function hitEnemy(Enemy $enemy)
    {
        $enemy->hit($this->enemyHit);
    }

    public function hitHero(Hero $hero)
    {
        $hero->hit($this->heroHit);
    }
}

