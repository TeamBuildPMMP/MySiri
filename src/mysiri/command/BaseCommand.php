<?php

/**
 * Copyright (C) XShockinFireX - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 */
 
namespace mysiri\command;

use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;
use mysiri\MySiri;

abstract class BaseCommand extends Command implements PluginIdentifiableCommand {

    private $plugin;

    public function __construct(String $name, MySiri $plugin) {
        parent::__construct($name);
        $this->plugin = $plugin;
    }

    public function getPlugin() {
        return $this->plugin;
    }
}