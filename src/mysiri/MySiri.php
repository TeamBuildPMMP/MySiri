<?php

/**
 * Copyright (C) XShockinFireX - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 */

namespace mysiri;

use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\network\protocol\TextPacket;
use mysiri\command\SiriCommand;
use mysiri\task\SiriTask;

class MySiri extends PluginBase {

    public static $convo_id;

	public function onEnable() {
		$this->saveDefaultConfig();
        $this->getServer()->getCommandMap()->register("siri", new SiriCommand($this));
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getLogger()->info(TextFormat::GREEN . "MySiri by XShockinFireX has been successfully enabled.");
	}

	public function textToSpeech(Player $player, String $text) {
    	$pk = new TextPacket();
        $pk->type = TextPacket::TYPE_CHAT;
        $pk->message = $text;
        $player->dataPacket($pk);
    }

	public function recieveMessage(Player $player, String $message) {
        $this->getServer()->getScheduler()->scheduleAsyncTask(new SiriTask([$player->getName(), MySiri::$convo_id[$player->getName()], str_replace(" ", "%20", $message)]));
    }
}