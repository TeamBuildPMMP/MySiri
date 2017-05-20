<?php

/**
 * Copyright (C) XShockinFireX - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 */

namespace mysiri;

use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerJoinEvent;

class EventListener implements Listener {

    private $plugin;

    public function __construct(MySiri $plugin) {
        $this->plugin = $plugin;
    }

    public function onPlayerJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        MySiri::$convo_id[$player->getName()] = rand(9999, 9999999999);
    }
}