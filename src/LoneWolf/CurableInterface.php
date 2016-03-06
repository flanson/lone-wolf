<?php
/**
 * Created by PhpStorm.
 * User: Grumly
 * Date: 06/03/2016
 * Time: 15:45
 */

namespace LoneWolf;


interface CurableInterface
{
    public function cure(Cure $cure);
}