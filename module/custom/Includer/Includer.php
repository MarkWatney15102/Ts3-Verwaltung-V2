<?php 

class Includer
{
    public function __construct()
    {
        $this->includeLibarys($this->getGoBackElemente());
    }

    private function includeLibarys(string $pathToFilePartOne)
    {
        echo '<link rel="stylesheet" href="' . $pathToFilePartOne . 'dist/css/build.css">';
        echo '<link rel="stylesheet" href="' . $pathToFilePartOne . 'dist/css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="' . $pathToFilePartOne . 'dist/css/message-boxes.css">';
        echo '<script src="' . $pathToFilePartOne . 'dist/js/jquery.min.js"></script>';
        echo '<script src="' . $pathToFilePartOne . 'dist/js/bootstrap.min.js"></script>';
    }

    private function getGoBackElemente()
    {
        $subroutingcount = Routing::getSubroutingCount();

        $pathToFilePartOne = '';

        for ($i = 0; $i < $subroutingcount; $i++) {
            $pathToFilePartOne .= "../";
        }

        return $pathToFilePartOne;
    }

}
