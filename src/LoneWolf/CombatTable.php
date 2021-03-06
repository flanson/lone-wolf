<?php

namespace LoneWolf;

class CombatTable
{
    /**
     * @var array
     */
    private $combatRatioTableList;

    public function __construct()
    {
        $this->combatRatioTableList = [
            -11 => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(100), new Hit(0)),
                2   => new CombatTableRolledDiceResult(new Hit(100), new Hit(0)),
                3   => new CombatTableRolledDiceResult(new Hit(8)  , new Hit(0)),
                4   => new CombatTableRolledDiceResult(new Hit(8)  , new Hit(0)),
                5   => new CombatTableRolledDiceResult(new Hit(7)  , new Hit(1)),
                6   => new CombatTableRolledDiceResult(new Hit(6)  , new Hit(2)),
                7   => new CombatTableRolledDiceResult(new Hit(5)  , new Hit(3)),
                8   => new CombatTableRolledDiceResult(new Hit(4)  , new Hit(4)),
                9   => new CombatTableRolledDiceResult(new Hit(3)  , new Hit(5)),
                0   => new CombatTableRolledDiceResult(new Hit(0)  , new Hit(6)),
            ]),
            -10 => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(100), new Hit(0)),
                2   => new CombatTableRolledDiceResult(new Hit(8)  , new Hit(0)),
                3   => new CombatTableRolledDiceResult(new Hit(7)  , new Hit(0)),
                4   => new CombatTableRolledDiceResult(new Hit(7)  , new Hit(1)),
                5   => new CombatTableRolledDiceResult(new Hit(6)  , new Hit(2)),
                6   => new CombatTableRolledDiceResult(new Hit(6)  , new Hit(3)),
                7   => new CombatTableRolledDiceResult(new Hit(5)  , new Hit(4)),
                8   => new CombatTableRolledDiceResult(new Hit(4)  , new Hit(5)),
                9   => new CombatTableRolledDiceResult(new Hit(3)  , new Hit(6)),
                0   => new CombatTableRolledDiceResult(new Hit(0)  , new Hit(7)),
            ]),
            -9  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(100), new Hit(0)),
                2   => new CombatTableRolledDiceResult(new Hit(8)  , new Hit(0)),
                3   => new CombatTableRolledDiceResult(new Hit(7)  , new Hit(0)),
                4   => new CombatTableRolledDiceResult(new Hit(7)  , new Hit(1)),
                5   => new CombatTableRolledDiceResult(new Hit(6)  , new Hit(2)),
                6   => new CombatTableRolledDiceResult(new Hit(6)  , new Hit(3)),
                7   => new CombatTableRolledDiceResult(new Hit(5)  , new Hit(4)),
                8   => new CombatTableRolledDiceResult(new Hit(4)  , new Hit(5)),
                9   => new CombatTableRolledDiceResult(new Hit(3)  , new Hit(6)),
                0   => new CombatTableRolledDiceResult(new Hit(0)  , new Hit(7)),
            ]),
            -8  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(8), new Hit(0)),
                2   => new CombatTableRolledDiceResult(new Hit(7), new Hit(0)),
                3   => new CombatTableRolledDiceResult(new Hit(6), new Hit(1)),
                4   => new CombatTableRolledDiceResult(new Hit(6), new Hit(2)),
                5   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                6   => new CombatTableRolledDiceResult(new Hit(5), new Hit(4)),
                7   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                8   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                9   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(8)),
            ]),
            -7  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(8), new Hit(0)),
                2   => new CombatTableRolledDiceResult(new Hit(7), new Hit(0)),
                3   => new CombatTableRolledDiceResult(new Hit(6), new Hit(1)),
                4   => new CombatTableRolledDiceResult(new Hit(6), new Hit(2)),
                5   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                6   => new CombatTableRolledDiceResult(new Hit(5), new Hit(4)),
                7   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                8   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                9   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(8)),
            ]),
            -6  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(6), new Hit(0)),
                2   => new CombatTableRolledDiceResult(new Hit(6), new Hit(1)),
                3   => new CombatTableRolledDiceResult(new Hit(5), new Hit(2)),
                4   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                5   => new CombatTableRolledDiceResult(new Hit(4), new Hit(4)),
                6   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                7   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                8   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(8)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(9)),
            ]),
            -5  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(6), new Hit(0)),
                2   => new CombatTableRolledDiceResult(new Hit(6), new Hit(1)),
                3   => new CombatTableRolledDiceResult(new Hit(5), new Hit(2)),
                4   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                5   => new CombatTableRolledDiceResult(new Hit(4), new Hit(4)),
                6   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                7   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                8   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(8)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(9)),
            ]),
            -4  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(6), new Hit(1)),
                2   => new CombatTableRolledDiceResult(new Hit(5), new Hit(2)),
                3   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                4   => new CombatTableRolledDiceResult(new Hit(4), new Hit(4)),
                5   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                6   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                7   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                8   => new CombatTableRolledDiceResult(new Hit(1), new Hit(8)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(9)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(10)),
            ]),
            -3  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(6), new Hit(1)),
                2   => new CombatTableRolledDiceResult(new Hit(5), new Hit(2)),
                3   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                4   => new CombatTableRolledDiceResult(new Hit(4), new Hit(4)),
                5   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                6   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                7   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                8   => new CombatTableRolledDiceResult(new Hit(1), new Hit(8)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(9)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(10)),
            ]),
            -2  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(5), new Hit(2)),
                2   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                3   => new CombatTableRolledDiceResult(new Hit(4), new Hit(4)),
                4   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                5   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                6   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                7   => new CombatTableRolledDiceResult(new Hit(2), new Hit(8)),
                8   => new CombatTableRolledDiceResult(new Hit(1), new Hit(9)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(10)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(11)),
            ]),
            -1  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(5), new Hit(2)),
                2   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                3   => new CombatTableRolledDiceResult(new Hit(4), new Hit(4)),
                4   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                5   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                6   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                7   => new CombatTableRolledDiceResult(new Hit(2), new Hit(8)),
                8   => new CombatTableRolledDiceResult(new Hit(1), new Hit(9)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(10)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(11)),
            ]),
            0   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(5), new Hit(3)),
                2   => new CombatTableRolledDiceResult(new Hit(4), new Hit(4)),
                3   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                4   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(7)),
                6   => new CombatTableRolledDiceResult(new Hit(2), new Hit(8)),
                7   => new CombatTableRolledDiceResult(new Hit(1), new Hit(9)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(10)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(11)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(12)),
            ]),
            1   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(5), new Hit(4)),
                2   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                3   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                4   => new CombatTableRolledDiceResult(new Hit(3), new Hit(7)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(8)),
                6   => new CombatTableRolledDiceResult(new Hit(2), new Hit(9)),
                7   => new CombatTableRolledDiceResult(new Hit(1), new Hit(10)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(11)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(12)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(14)),
            ]),
            2   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(5), new Hit(4)),
                2   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                3   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                4   => new CombatTableRolledDiceResult(new Hit(3), new Hit(7)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(8)),
                6   => new CombatTableRolledDiceResult(new Hit(2), new Hit(9)),
                7   => new CombatTableRolledDiceResult(new Hit(1), new Hit(10)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(11)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(12)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(14)),
            ]),
            3   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                2   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                3   => new CombatTableRolledDiceResult(new Hit(3), new Hit(7)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(8)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(9)),
                6   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                7   => new CombatTableRolledDiceResult(new Hit(1), new Hit(11)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(12)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(14)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(16)),
            ]),
            4   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(4), new Hit(5)),
                2   => new CombatTableRolledDiceResult(new Hit(3), new Hit(6)),
                3   => new CombatTableRolledDiceResult(new Hit(3), new Hit(7)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(8)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(9)),
                6   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                7   => new CombatTableRolledDiceResult(new Hit(1), new Hit(11)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(12)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(14)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(16)),
            ]),
            5   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(4), new Hit(6)),
                2   => new CombatTableRolledDiceResult(new Hit(3), new Hit(7)),
                3   => new CombatTableRolledDiceResult(new Hit(3), new Hit(8)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(9)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                6   => new CombatTableRolledDiceResult(new Hit(1), new Hit(11)),
                7   => new CombatTableRolledDiceResult(new Hit(0), new Hit(12)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(14)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(16)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(18)),
            ]),
            6   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(4), new Hit(6)),
                2   => new CombatTableRolledDiceResult(new Hit(3), new Hit(7)),
                3   => new CombatTableRolledDiceResult(new Hit(3), new Hit(8)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(9)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                6   => new CombatTableRolledDiceResult(new Hit(1), new Hit(11)),
                7   => new CombatTableRolledDiceResult(new Hit(0), new Hit(12)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(14)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(16)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(18)),
            ]),
            7   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(4), new Hit(7)),
                2   => new CombatTableRolledDiceResult(new Hit(3), new Hit(8)),
                3   => new CombatTableRolledDiceResult(new Hit(2), new Hit(9)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(11)),
                6   => new CombatTableRolledDiceResult(new Hit(1), new Hit(12)),
                7   => new CombatTableRolledDiceResult(new Hit(0), new Hit(14)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(16)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(18)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
            ]),
            8   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(4), new Hit(7)),
                2   => new CombatTableRolledDiceResult(new Hit(3), new Hit(8)),
                3   => new CombatTableRolledDiceResult(new Hit(2), new Hit(9)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(11)),
                6   => new CombatTableRolledDiceResult(new Hit(1), new Hit(12)),
                7   => new CombatTableRolledDiceResult(new Hit(0), new Hit(14)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(16)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(18)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
            ]),
            9   => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(3), new Hit(8)),
                2   => new CombatTableRolledDiceResult(new Hit(3), new Hit(9)),
                3   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(11)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(12)),
                6   => new CombatTableRolledDiceResult(new Hit(1), new Hit(14)),
                7   => new CombatTableRolledDiceResult(new Hit(0), new Hit(16)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(18)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
            ]),
            10  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(3), new Hit(8)),
                2   => new CombatTableRolledDiceResult(new Hit(3), new Hit(9)),
                3   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(11)),
                5   => new CombatTableRolledDiceResult(new Hit(2), new Hit(12)),
                6   => new CombatTableRolledDiceResult(new Hit(1), new Hit(14)),
                7   => new CombatTableRolledDiceResult(new Hit(0), new Hit(16)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(18)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
            ]),
            11  => new CombatTableRolledDiceResultList([
                1   => new CombatTableRolledDiceResult(new Hit(3), new Hit(9)),
                2   => new CombatTableRolledDiceResult(new Hit(2), new Hit(10)),
                3   => new CombatTableRolledDiceResult(new Hit(2), new Hit(11)),
                4   => new CombatTableRolledDiceResult(new Hit(2), new Hit(12)),
                5   => new CombatTableRolledDiceResult(new Hit(1), new Hit(14)),
                6   => new CombatTableRolledDiceResult(new Hit(1), new Hit(16)),
                7   => new CombatTableRolledDiceResult(new Hit(0), new Hit(18)),
                8   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
                9   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
                0   => new CombatTableRolledDiceResult(new Hit(0), new Hit(100)),
            ]),
        ];
    }

    public function getCombatRatioTableList(CombatRatio $combatRatio)
    {
        return $this->combatRatioTableList[$combatRatio->getCombatRationValue()];
    }

}
