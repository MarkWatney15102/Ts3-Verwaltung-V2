<?php 

class Redirect
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function redirect(string $uri)
    {
        header("Location: " . $uri);
    }

    public static function to(string $request)
    {
        header("Location: " . $request);
    }
}
