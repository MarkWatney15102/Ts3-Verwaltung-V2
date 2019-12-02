<?php

class UserModel
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var array
     */
    private $userdata;

    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config, int $userId)
    {
        $this->userId = $userId;
        $this->config = $config;

        $this->readUserData();
    }    

    private function readUserData()
    {
        $userdata = $this->config->database->select('user_login', [
            'user_id',
            'username',
            'reg_mail',
            'password',
            'create_time'
        ],[
            'user_id' => $this->userId
        ]);

        $this->userdata = $userdata;
    }
}
