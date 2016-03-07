<?php

namespace LoneWolf;

use LoneWolf\Exceptions\EnemyDeadException;
use LoneWolf\Exceptions\HeroDeadException;

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
    private $combatTableRolledDiceResultList;

    public function __construct(Hero $hero, Enemy $enemy)
    {
        $this->hero = $hero;
        $this->enemy = $enemy;
        $combatRatio = $hero->compareCombatRatio($enemy);
//        $test = new CombatRatio(11);
        $combatTable = new CombatTable();
        $this->combatTableRolledDiceResultList = $combatTable->getCombatRatioTableList($combatRatio);
    }

    public function rolledDice(DiceResult $diceResult)
    {
        $combatTableRolledDiceResult = $this->combatTableRolledDiceResultList->rolledDice($diceResult);
//        print_r($combatTableRolledDiceResult);
        //Todo Carefull if hero is dead throw Exception catch by app
        $combatTableRolledDiceResult->hitHero($this->hero);
        //Todo Carefull if Enemy is dead throw Exception catch by app
        $combatTableRolledDiceResult->hitEnemy($this->enemy);
    }

}
