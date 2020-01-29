<?php 

interface ControllerInterface 
{
    public function init(Title $title, Config $config, array $params);
    public function createView();
}
