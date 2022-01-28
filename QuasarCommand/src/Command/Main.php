<?php

namespace Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\item\ItemFactory;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getLogger()->notice("Enable");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        $commandname = $command->getName();
        if ($commandname == "heal") {
            if ($sender instanceof Player) {
                $sender->sendMessage("§3Tu as été heal");
                $sender->getHealth();
                $sender->setHealth(20);
            }
        }
        if ($commandname == "feed") {
            if ($sender instanceof Player) {
                $sender->getHungerManager()->setFood(20);
                $sender->getHungerManager()->setSaturation(20);
                $sender->sendMessage("§3Tu as bien été feed !");
            }
        }
        if ($commandname == "speed") {
            $sender->sendMessage("Speed activé !");
            $sender->getMovementSpeed();
            $sender->setMovementSpeed(4);
            $sender->getInventory()->removeItem(ItemFactory::getInstance()->getItem(288));
        }
        if ($commandname == "uphealth") {
            $sender->getMaxHealth();
            $sender->setMaxHealth(40);
            $sender->getHealth();
            $sender->setHealth(40);
            $sender->getArmorInventory()->removeItem(ItemFactory::getInstance()->get(306));
        }
        return true;
    }
}
