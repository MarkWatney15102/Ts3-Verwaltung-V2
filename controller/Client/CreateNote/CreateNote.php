<?php 

class CreateNote implements ControllerInterface
{
    /**
     * @var Config
     */
    private $config;

    public function init(Title $title, Config $config)
    {
        $this->config = $config;
        $title->setTitle("Create Note");
    }

    public function createView()
    {
        if (isset($_POST['create_note'])) {
            $this->config->database->insert("client_notes", [
                "user_uid" => $_POST['client_uid'],
                "note_desc_short" => htmlentities($_POST['note_desc_short']),
                "note_desc" => htmlentities($_POST['note_desc']),
                "creator_id" => $_POST['creator_id']
            ]);

            $this->config->redirect->redirect("/client?client_uid=" . urlencode($_GET['client_uid']));
        }

        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Client/CreateNote/CreateNote.php");
    }
}

