<?php 

class NoteProvider
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var string
     */
    private $noteId;

    public function __construct(Config $config, int $noteId) 
    {
        $this->config = $config;
        $this->noteId = $noteId;
    }

    public function getNoteData()
    {
        $note = $this->config->database->select("client_notes", [
            "id",
            "user_uid",
            "note_desc_short",
            "note_desc",
            "creator_id",
            "create_time"
        ],[
            "id" => $this->noteId
        ]);

        return $note[0];
    }
}
