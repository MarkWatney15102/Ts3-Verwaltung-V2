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

    if (isset($_POST['kick_client'])) {
      $this->kickClient();
    }

    require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Client/ClientProfile/ClientProfile.php");
  }

  private function kickClient()
  {
    if (empty($_POST['kick_reason'])) {
      $kickReason = htmlentities($_POST['kick_reason']);
    } else {
      $kickReason = 'Client Kicked by Admin';
    }

    $this->config->ts->clientKick($_POST['clid'], TeamSpeak3::KICK_SERVER, $kickReason);
    $this->config->logger->logAction($this->config->user->getUserID(), 'Client Kick', htmlentities($_POST['clid']));

    $message = new Message();
    $message->setMessageType(1);
    $message->setMessageText("Client successfullly kicked");
    $message->printMessage();
  }
}
