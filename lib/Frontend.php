<?php

class Frontend extends ApiFrontend {
  function init(){
    parent::init();

    $this->dbConnect();

    $this->addLocation('atk4-addons',array(
                'php'=>array(
                    'mvc',
                    'misc/lib',
                    ))

    )->setParent($this->pathfinder->base_location);

    $this->add('jUI');

    $menu = $this->add('Menu', null, 'Menu');
    $menu->addMenuItem('index', 'Home');
    $menu->addMenuItem('leads');
    $menu->addMenuItem('actions');
  }
}
