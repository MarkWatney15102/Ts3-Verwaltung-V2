<?php 

class Login extends Config
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var array
     */
    private $userdata;

    /**
     * @var boolean
     */
    private $auth;

    public function __construct(string $username, string $password, Config $config) 
    {
        $this->username = $username;
        $this->password = $password;
        $this->config = $config;
    }

    public function checkLoginData()
    {
        $this->getUserdataByUsername();

        if ($this->userdata === null) {
            $this->auth = false;
        } else {
            if (password_verify($this->password, $this->userdata[0]['password'])) {
                $this->auth = true;
            } else {
                $this->auth = false;
            }
        }
    }

    private function getUserdataByUsername()
    {
        $this->userdata = $this->config->database->select('user_login', 
            [
                'user_id',
                'username',
                'reg_mail',
                'password',
                'create_time'
            ],[
                'username' => $this->username
            ]
        );
    }

    public function isAuth() 
    {
        return $this->auth;
    }
}