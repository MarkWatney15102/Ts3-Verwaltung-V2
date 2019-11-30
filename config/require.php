<?php 

class RequireContainer
{

    /**
     * @var array
     */
    private $requires;

    public function __construct()
    {
        $this->initRequires();
    }

    private function initRequires()
    {
        $jsonFile = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/config/requires.json");
        $json = json_decode($jsonFile, true);

        foreach ($json['requires']['lib'] as $key => $value) {
            $this->requires['lib'][$key] = $value;
            require_once($_SERVER["DOCUMENT_ROOT"] . "/module/lib/" . $value);
        }

        foreach ($json['requires']['custom'] as $key => $value) {
            $this->requires['custom'][$key] = $value;
            require_once($_SERVER["DOCUMENT_ROOT"] . "/module/custom/" . $value);
        }
    }

    private function getRequiresList()
    {
        return $this->requires;
    }
}
