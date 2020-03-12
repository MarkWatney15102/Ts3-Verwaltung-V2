<?php 

class CreateNote implements ControllerInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var array
     */
    private $params;

    public function init(Title $title, Config $config, array $params)
    {
        $this->config = $config;
        $this->params = $params;
        $title->setTitle("Create Note");
    }

    public function createView()
    {
        if (isset($_POST['create_note'])) {
            $this->config->database->insert("client_notes", [
                "user_uid" => $_POST['client_uid'],
                "note_desc_short" => RequestCleaner::cleanTextInput($_POST['note_desc_short']),
                "note_desc" => RequestCleaner::cleanTextInput($_POST['note_desc']),
                "creator_id" => $_POST['creator_id']
            ]);

            $this->config->redirect->redirect("/client/param=" . urlencode($this->params['url_param']));
        }

        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Client/CreateNote/CreateNote.php");
    }
}

