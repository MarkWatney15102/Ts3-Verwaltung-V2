<?php

class User extends Singleton
{
    /**
     * @var int
     */
    private static $userId;

    /**
     * @var array
     */
    private $userdata;

    public static function read(int $userId) {
        self::$userId = $userId;

        self::readUserData();
    }

    private static function readUserData()
    {
        $userdata = self::$config->database->select('user_login', [
            'user_id',
            'username',
            'reg_mail',
            'password',
            'active',
            'create_time'
        ],[
            'user_id' => self::$userId
        ]);

        if ($userdata == null) {
          throw new \Exception("User didnt exist");
        }

        self::$userdata = $userdata;
    }

    public function getUserID()
    {
      return self::$userdata[0]['user_id'];
    }

    public function getUsername()
    {
      return self::$userdata[0]['username'];
    }

    public function getRegMail()
    {
      return self::$userdata[0]['reg_mail'];
    }

    public function getActive()
    {
      return self::$userdata[0]['active'];
    }

    public function setActive(int $status)
    {
        self::$userdata[0]['active'] = $status;

        self::$config->database->update('user_login', [
            'active' => $status
        ],[
            'user_id' => self::$userId
        ]);
    }
}
