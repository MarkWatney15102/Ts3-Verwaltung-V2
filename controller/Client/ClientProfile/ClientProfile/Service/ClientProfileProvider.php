<?php

class ClientProfileProvider extends ClientProfile
{
  /**
  * @var Config
  */
  private $config;

  /**
  * @var
  */
  private $clientUID;

  function __construct(Config $config, string $clientUID)
  {
    $this->clientUID = $clientUID;
    $this->config = $config;
  }

  public function getNotes()
  {
    $notes = $this->config->database->select('client_notes', [
      'id',
      'user_uid',
      'note_desc_short',
      'note_desc',
      'creator_id',
      'create_time'
    ],[
      'user_uid' => $this->clientUID
    ]);

    return $notes;
  }
}