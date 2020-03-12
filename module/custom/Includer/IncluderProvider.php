<?php 

class IncluderProvider
{
    /**
     * @var array
     */
    private $cssFiles;

    /**
     * @var array
     */
    private $jsFiles;

    /**
     * @var string
     */
    private $pathToFilePartOne;

    public static function loadDependencies()
    {
        $subroutingcount = Routing::getSubroutingCount();

        $pathToFilePartOne = '';

        for ($i = 0; $i < $subroutingcount; $i++) {
            $pathToFilePartOne .= "../";
        }

        $pathToFilePartOne;

        echo '<script src="' . $pathToFilePartOne . 'dist/js/jquery.min.js"></script>';
        echo '<script src="' . $pathToFilePartOne . 'dist/js/bootstrap.min.js"></script>';
        echo '<script src="' . $pathToFilePartOne . 'dist/js/fontawesome.min.js"></script>';

        echo '<link rel="stylesheet" href="' . $pathToFilePartOne . 'dist/css/build.css">';
        echo '<link rel="stylesheet" href="' . $pathToFilePartOne . 'dist/css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="' . $pathToFilePartOne . 'dist/css/message-boxes.css">';
    }

    public function setPathToFilePartOne()
    {
        $subroutingcount = Routing::getSubroutingCount();

        $pathToFilePartOne = '';

        for ($i = 0; $i < $subroutingcount; $i++) {
            $pathToFilePartOne .= "../";
        }

        $this->pathToFilePartOne = $pathToFilePartOne;
    }

    public function getPathToFilePartOne()
    {
        return $this->pathToFilePartOne;
    }
}
