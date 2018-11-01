<?php
namespace CoreUI;
use pocketmine\Main;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
class AutoXP extends PluginBase implements Listener{

	public function onBreak(BlockBreakEvent $event){
	    if($event->isCancelled()){
	        return;
        }
		$event->getPlayer()->addXp($event->getXpDropAmount());
		$event->setXpDropAmount(0);
	}
    /**
     * @param PlayerDeathEvent $event
     * @priority HIGHEST
     */
	public function onPlayerKill(PlayerDeathEvent $event){
	    if($event->isCancelled()){
	        return;
        }
		$player = $event->getPlayer();
		$cause = $player->getLastDamageCause();
		if($cause instanceof EntityDamageByEntityEvent){
			$damager = $cause->getDamager();
			if($damager instanceof Player){
				$damager->addXp($player->getXpDropAmount());
				$player->setCurrentTotalXp(0);
			}
		}
	}
}
