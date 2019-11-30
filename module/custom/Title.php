<?php

class Title
{
    /**
     * @var string
     */
    private $pageTitle;

    public function setTitle(string $title) 
    {
        $this->pageTitle = $title;
        echo '<title>' . $this->pageTitle . '</title>';
    }

    public function getTitle()
    {
        return $this->pageTitle;
    }
}
