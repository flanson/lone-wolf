<?php

namespace LoneWolf\Story;

use LoneWolf\Exceptions\ConstructorException;

class Destination
{
    /**
     * @var int
     */
    private $chapterNumber;

    /**
     * Destination constructor.
     * @param int $chapterValue
     * @throws ConstructorException
     */
    public function __construct($chapterValue)
    {
        $this->aDestinationShouldBeBetween1And350($chapterValue);
        $this->chapterNumber = $chapterValue;
    }

    /**
     * @param int $chapterValue
     * @throws ConstructorException
     */
    public function aDestinationShouldBeBetween1And350($chapterValue)
    {
        if ($chapterValue < 1 || $chapterValue > 350) {
            throw new ConstructorException("A destination should be between 1 and 350");
        }
    }

}
