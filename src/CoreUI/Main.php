<?php
namespaces: CoreUI;
use jojoe77777\FormAPI;

class Main extends PluginBase implements Listener{
    
	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents(($this), $this);
		$this->getLogger()->info("Plugin Enabled By WarTechDevs");
	}
