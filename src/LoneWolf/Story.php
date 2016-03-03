<?php

namespace LoneWolf;

use LoneWolf\Exceptions\ConstructorException;

class Story
{
    /**
     * @var string
     */
    private $title;

    /**
     * Story constructor.
     * @param string $storyTitle
     * @throws ConstructorException
     */
    public function __construct($storyTitle)
    {
        if ($storyTitle === "") {
            throw new ConstructorException('You can\'t create a Story with an empty name');
        }
        $this->title = $storyTitle;
    }


}
