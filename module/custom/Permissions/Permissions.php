<?php 

class Permissions
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     * 
     * 0 = Everyone
     * 10 = Client
     * 50 = Admin
     * 100 = Systemadmin
     */
    private $userLevel;

    public function __construct(Config $config, $userId)
    {
        $this->config = $config;
        $this->userId = $userId;
        $this->userLevel = $this->getUserLevel();
    }

    private function getUserLevel()
    {
        $userLevel = $this->config->database->select('user_login', [
            'level'
        ],[
            'user_id' => $this->userId
        ]);

        return (int)$userLevel[0]['level'];
    }

    public function checkRoutAccess(int $routAccessLevel): bool
    {
        if ($routAccessLevel <= $this->userLevel) {
            return true;
        }

        return false;
    }

    public function checkElementAccess(int $elementAccessLevel): bool
    {
        if ($elementAccessLevel <= $this->userLevel) {
            return true;
        }

        return false;
    }
}
