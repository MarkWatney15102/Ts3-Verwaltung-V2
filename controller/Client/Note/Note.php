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

    public function init(Title $title, Config $config)
    {
        $this->config = $config;
        $title->setTitle("Client Profile");
        $this->noteProvider = new NoteProvider($config, htmlentities($_GET['note_id']));
    }

    public function createView()
    {
        $note = $this->noteProvider->getNoteData();
        $timeParser = new TimeParser();
        $createTime = $timeParser->timeElapsedString($note['create_time']);

        if (isset($_POST['delete_note'])) {
            $this->config->database->delete("client_notes", [
                "id" => htmlentities($_GET['note_id'])
            ]);

            $this->config->redirect->redirect("/home");
        }

        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Client/Note/Note.php");
    }
}
