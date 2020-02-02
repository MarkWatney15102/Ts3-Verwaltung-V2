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

    public function loadDependencies()
    {
        $this->loadCSSFiles();
        $this->loadJSFiles();
    }

    private function loadJSFiles() 
    {
        echo '<script src="' . $this->pathToFilePartOne . 'dist/js/jquery.min.js"></script>';
        echo '<script src="' . $this->pathToFilePartOne . 'dist/js/bootstrap.min.js"></script>';
    }

    private function loadCSSFiles()
    {
        echo '<link rel="stylesheet" href="' . $this->pathToFilePartOne . 'dist/css/build.css">';
        echo '<link rel="stylesheet" href="' . $this->pathToFilePartOne . 'dist/css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="' . $this->pathToFilePartOne . 'dist/css/message-boxes.css">';
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
