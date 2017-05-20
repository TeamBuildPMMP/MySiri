<?php

/**
 * Copyright (C) XShockinFireX - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 */

namespace mysiri\command;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\command\CommandSender;
use mysiri\MySiri;

class SiriCommand extends BaseCommand {

    public function __construct(MySiri $plugin) {
        parent::__construct("siri", $plugin);
    }

    public function execute(CommandSender $sender, $alias, array $args) {
        if(!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::RED . "You must run this command in-game.");
            return false;
        }
        if(!isset($args[0])) {
            $sender->sendMessage(TextFormat::RED . "Usage: /siri <message>");
            return false;
        }
        $sender->sendMessage(TextFormat::GRAY . "Please wait several seconds for a response...");
        $message = null;
        foreach($args as $text) {
            $message .= $text . " ";
        }
        $this->getPlugin()->recieveMessage($sender, $message);
        return true;
    }
}