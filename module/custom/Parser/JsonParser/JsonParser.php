<?php 

class JsonParser
{
    /**
     * @var string
     */
    private $jsonFilePath;

    /**
     * @var array
     */
    private $jsonArray;

    public function __construct(string $jsonFilePath)
    {
        $this->jsonFilePath = $jsonFilePath;

        $this->parseJsonToArray();
    }

    private function parseJsonToArray()
    {
        $jsonFile = file_get_contents($this->jsonFilePath);
        $this->jsonArray = json_decode($jsonFile);
    }

    public function getJsonArray()
    {
        return $this->jsonArray;
    }
}
