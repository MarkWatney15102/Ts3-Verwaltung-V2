<?php

class Message
{
    /**
     * @var string
     * 1 = success
     * 2 = waring
     * 3 = danger / error
     * 4 = info
     */
    private $messageType;

    /**
     * @var string
     */
    private $messageText;

    public function setMessageType(int $messageType = 0)
    {
        switch ($messageType) {
            case 1:
                $this->messageType = "success";
                break;
            case 2:
                $this->messageType = 'warning';
                break;
            case 3:
                $this->messageType = 'danger';
                break;
            case 4:
                $this->messageType = 'info';
                break;
            default:
                $this->messageType = 'primary';
        }
    }

    public function getMessageType()
    {
        return $this->messageType;
    }

    public function setMessageText(string $messageText)
    {
        $this->messageText = $messageText;
    }

    public function getMessageText()
    {
        return $this->messageText;
    }

    public function printMessage()
    {
        $html = '<div class="col-md-3 message-box">
                    <div class="alert alert-' . $this->messageType . '">'
                        . $this->messageText . 
                    '</div>
                </div>';

        echo $html;
    }
}
