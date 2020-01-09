<?php

class ClientProfile implements ControllerInterface
{
  /**
   * @var Config
   */
  private $config;

  /**
  * @var ClientProfileProvider
  */
  private $clientProfileProvider;

  /**
  * @var string
  */
  private $clientUID;

  public function init(Title $title, Config $config)
  {
      $this->config = $config;
      $title->setTitle("Client Profile");

      $this->clientUID = $_GET['client_uid'];
      $this->ClientProfileProvider = new ClientProfileProvider($this->config, $this->clientUID);
  }

  public function createView()
  {
    try {
      $client = $this->config->ts->clientGetByUid(rawurldecode($this->clientUID));
    } catch (Exception $e) {
      throw new Exception("Client is offline or didnt exist", 1);
    }

    if (isset($_POST['kick_client'])) {
      $this->kickClient();
    }

    if (isset($_POST['ban_client'])) {
      $this->banClient();
    }

    if (isset($_POST['save_server_groups'])) {
      $this->changeClientServerGroups();
    }

    $notes = $this->ClientProfileProvider->getNotes();
    $serverGroups = $this->ClientProfileProvider->getServerGroups();
    $clientServerGroups = $this->ClientProfileProvider->getAllClientSetServerGroups($client);

    require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Client/ClientProfile/ClientProfile.php");
  }

  private function kickClient(): void
  {
    if (!empty($_POST['kick_reason'])) {
      $kickReason = htmlentities($_POST['kick_reason']);
    } else {
      $kickReason = 'Client Kicked by Admin';
    }

    $this->config->ts->clientKick($_POST['clid'], TeamSpeak3::KICK_SERVER, $kickReason);
    $this->config->logger->logAction(
      $this->config->user->getUserID(),
      'Client Kick',
      htmlentities($_POST['clid'])
    );

    $message = new Message();
    $message->setMessageType(1);
    $message->setMessageText("Client successfullly kicked");
    $message->printMessage();
  }

  private function banClient(): void
  {
    if (!empty($_POST['ban_reason'])) {
      $banReason = htmlentities($_POST['ban_reason']);
      if (isset($_POST['ban_sure'])) {
        switch ($_POST['ban_unit']) {
          case 1:
            $banTime = $_POST['ban_time'];
            break;
          case 2:
            $banTime = $_POST['ban_time'] * 60;
            break;
          case 3:
            $banTime = $_POST['ban_time'] * 60 * 60;
            break;
          case 4:
            $banTime = $_POST['ban_time'] * 60 * 60 * 24;
            break;
          case 5:
            $banTime = 0;
            break;
        }

        $this->config->ts->clientBan($_POST['clid'], $banTime, $banReason);
        $this->config->logger->logAction(
          $this->config->user->getUserID(),
          'Client Ban | Time: ' . $banTime . " | Reason: " . $banReason,
          htmlentities($_POST['clid'])
        );
      }
    } else {
      $message = new Message();
      $message->setMessageText(3);
      $message->setMessageText("You have to give a reason");
      $message->printMessage();
    }
  }

  /**
   * @todo Remove if checkbox is uncked
   */
  private function changeClientServerGroups(): void
  {
    $client = $this->config->ts->clientGetByUid(rawurldecode($this->clientUID));
    $serverGroups = $this->ClientProfileProvider->getServerGroups();
    $clientServerGroups = $this->ClientProfileProvider->getAllClientSetServerGroups($client);

    if (!empty($_POST['group'])) {
      $groups = $_POST['group'];
      foreach ($groups as $selectedGroup => $ivalue) {
        $status = $ivalue ? 'checked' : '';
  
        if ($status == "checked") {
          if (!in_array($ivalue, array_keys($clientServerGroups))) {
            // Add Client to Group
            $client->addServerGroup($ivalue, $client['client_database_id']);
          }
        }
      }
    } else {
      // Remove all Groups
      foreach ($serverGroups as $gid => $gname) {
        if ($gid != DEFAULT_SERVER_GROUP) {
          if (in_array($gid, array_keys($clientServerGroups))) {
            $client->remServerGroup($gid);
          }
        }
      }
    }
  }
}
