<?php
namespace CoreUI;
use pocketmine\plugin\PluginBase;

class CoreUI extends PluginBase implements Listener{

      public function onEnable(){
        $this->getLogger()->info("CoreUI Enabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        }
    }
    public function onDisable(){
        $this->getLogger()->info("CoreUI Disabled");
    }
}
