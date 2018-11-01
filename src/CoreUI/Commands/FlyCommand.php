<?php
declare(strict_types = 1);
namespace Core\Commands;
use Core\BaseFiles\BaseAPI;
use Core\BaseFiles\BaseCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
class FlyCommand extends BaseCommand{
    /**
     * @param BaseAPI $api
     */
    public function __construct(BaseAPI $api){
        parent::__construct($api, "fly", "fly command by wartechdevs", "[player]");
        $this->setPermission("coreui.fly.use");
    }
    /**
     * @param CommandSender $sender
     * @param string $alias
     * @param array $args
     * @return bool
     */
    public function execute(CommandSender $sender, string $alias, array $args): bool{
        if(!$this->testPermission($sender)){
            return false;
        }
        if((!isset($args[0]) && !$sender instanceof Player) || count($args) > 1){
            $this->sendUsage($sender, $alias);
            return false;
        }
        $player = $sender;
        if(isset($args[0])){
            if(!$sender->hasPermission("coreui.fly.other")){
                $sender->sendMessage($this->getPermissionMessage());
                return false;
            }elseif(!($player = $this->getAPI()->getPlayer($args[0]))){
                $sender->sendMessage("player not found");
                return false;
            }
        }
        $this->getAPI()->switchCanFly($player);
        $player->sendMessage("flying mode " . ($this->getAPI()->canFly($player) ? "enabled" : "disabled") . "!");
        if($player !== $sender){
            $sender->sendMessage("flying mode " . ($this->getAPI()->canFly($player) ? "enabled" : "disabled") . " for " . $player->getDisplayName());
        }
        return true;
    }
}
