<?php
/**
 * Created by PhpStorm.
 * User: Grumly
 * Date: 06/03/2016
 * Time: 15:47
 */

namespace LoneWolf;


interface hittableInterface
{
    public function hit(Hit $hit);
}