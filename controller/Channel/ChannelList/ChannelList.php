<?php 

class ChannelList implements ControllerInterface
{
    /**
     * @var Config
     */
    private $config;

    public function init(Title $title, Config $config, array $params)
    {
        $this->config = $config;
        $title->setTitle("Channel List");
    }

    public function createView()
    {
        $channelList = $this->config->ts->channelList();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/views/Channel/ChannelList/ChannelList.php");
    }
}

