<?php
namespaces: CoreUI;
use jojoe77777\FormAPI;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info("CoreUI By WarTechDevs Enabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        }
    }
    public function onDisable(){
        $this->getLogger()->info("CoreUI By WarTechDevs Disabled");
    }
}
