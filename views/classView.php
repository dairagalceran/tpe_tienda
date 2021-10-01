<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class ClassView {

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showClasses($classes){

        $this->smarty->assign('titulo','Categorias');
        $this->smarty->assign('categorias', $classes);

        $this->smarty->display('../templates/classList.tpl');
        
    }
}