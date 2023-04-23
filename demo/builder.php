<?php
class Window
{
    function __construct($d, $m, $v){
        $this->dialog = $d;
        $this->modal = $m;
        $this->visible = $v;
    }
}

class CreateWindow
{
    function setDialog($flag = false){
        $this->dialog = $flag;
        return $this;
    }
    function setModal($flag = false){
        $this->modal = $flag;
        return $this;
    }
    function setVisible($flag = false){
        $this->visible = $flag;
        return $this;
    }
    function create(){
        return new Window($this->dialog, $this->modal, $this->visible);
    }
}

$creator = new CreateWindow();
$window = $creator->setVisible(true)->setDialog(true)->create();