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
            'active',
            'create_time'
        ],[
            'user_id' => $this->userId
        ]);

        $this->userdata = $userdata;
    }

    public function getUserID()
    {
      return $this->userdata[0]['user_id'];
    }

    public function getUsername()
    {
      return $this->userdata[0]['username'];
    }

    public function getRegMail()
    {
      return $this->userdata[0]['reg_mail'];
    }

    public function getActive()
    {
      return $this->userdata[0]['active'];
    }

    public function setActive(int $status)
    {
      $this->userdata[0]['active'] = $status;

      $this->config->database->update('user_login', [
        'active' => $status
      ],[
        'user_id' => $this->userId
      ]);
    }
}
