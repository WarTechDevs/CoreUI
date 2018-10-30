<?php
namespace CoreUI\Main;
use pocketmine\plugin\PluginBase;

class CoreUI extends PluginBase implements Listener{

      public function onEnable(){
        $this->getLogger()->info("CoreUI Enabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        }
    }
    public function onDisable(){
        $this->getLogger()->info("CoreUI Disabled");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
}
    public function checkDepends(){
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("CoreUI Requires FormAPI By JoeJoe77777 To Work");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }
