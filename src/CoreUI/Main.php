<?php
namespace CoreUI;
use pocketmine\plugin\PluginBase;
class Main extends PluginBase implements Listener{
	
	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents(($this), $this);
		$this->getLogger()->info("Plugin Enabled By WarTechDevs");
	}
}
