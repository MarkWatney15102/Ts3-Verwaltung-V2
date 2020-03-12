<?php

class ActionLogger
{
  /**
  * @var Config
  */
  private $config;

  public function __construct(Config $config)
  {
    $this->config = $config;
  }

  public static function logAction(int $userId, String $desc, int $referenzId = 0)
  {
    $this->config->database->insert('user_actions', [
      'user_id' => $userId,
      'action_desc' => $desc,
      'referenz_id' => $referenzId
    ]);
  }
}
