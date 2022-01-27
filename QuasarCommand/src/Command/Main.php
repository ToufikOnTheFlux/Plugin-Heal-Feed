<?php

namespace Command;

use pocketmine\block\Block;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\data\bedrock\EffectIds;
use pocketmine\entity\effect\Effect;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\entity\effect\EffectInstance;

class Main extends PluginBase implements Listener{
    public function onEnable(): void
    {
        $this->getLogger()->notice("Enable");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
{
    $commandname = $command->getName();
    if($commandname == "heal") {
        if ($sender instanceof Player) {
            $sender->sendMessage("§3Tu a été heal");
            $sender->getHealth();
            $sender->setHealth(20);
        }
    }
        if($commandname == "feed") {
            if ($sender instanceof Player) {
                $sender->getHungerManager()->setFood(20);
                $sender->getHungerManager()->setSaturation(20);
                $sender->sendMessage("§3Tu a bien été feed !");
            }
        }
        return true;
     }
}
