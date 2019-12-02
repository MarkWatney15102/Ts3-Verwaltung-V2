<?php 

interface ControllerInterface 
{
    public function init(Title $title, Config $config);
    public function createView();
}
