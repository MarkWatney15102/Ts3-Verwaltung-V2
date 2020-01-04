<?php

class ClientProfile implements ControllerInterface
{
  /**
   * @var Config
   */
  private $config;

  public function init(Title $title, Config $config)
  {
      $this->config = $config;
      $title->setTitle("Client Profile");
  }

  public function createView()
  {
    try {
      $client = $this->config->ts->clientGetByUid(rawurldecode($_GET['client_uid']));
    } catch (Exception $e) {
      throw new Exception("Client is offline or didnt exist", 1);
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Client/ClientProfile/ClientProfile.php");
  }
}
