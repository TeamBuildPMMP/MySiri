<?php
namespace mysiri\task;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\scheduler\AsyncTask;

class SiriTask extends AsyncTask {

    private $data;

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function onRun() {
        $api = "http://api.program-o.com/v2/chatbot/?bot_id=12&say=" . $this->data[2] . "&convo_id=" . $this->data[1] . "&format=json";
        $api = json_decode(file_get_contents($api));
        $this->setResult($api->botsay);
    }

    public function onCompletion(Server $server) {
    	$server->getPluginManager()->getPlugin("MySiri")->textToSpeech($server->getPlayerExact($this->data[0]), $this->getResult());
    }
}