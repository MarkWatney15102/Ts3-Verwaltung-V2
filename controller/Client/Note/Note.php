<?php 

class Note implements ControllerInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var NoteProvider
     */
    private $noteProvider;

    /**
     * @var array
     */
    private $params;

    public function init(Title $title, Config $config, array $params)
    {
        $this->config = $config;
        $this->params = $params;

        $title->setTitle("Client Profile");
        $this->noteProvider = new NoteProvider($config, htmlentities($this->params['url_param']));
    }

    public function createView()
    {
        $note = $this->noteProvider->getNoteData();
        $timeParser = new TimeParser();
        $createTime = $timeParser->timeElapsedString($note['create_time']);

        if (isset($_POST['delete_note'])) {
            $this->config->database->delete("client_notes", [
                "id" => htmlentities($this->params['url_param'])
            ]);

            $this->config->redirect->redirect("/home");
        }

        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Client/client/note/client/note.php");
    }
}
