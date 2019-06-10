<?php

namespace Core;

class View
{
    public static function render($view, $args = null)
    {
        extract($args, EXTR_SKIP);

        require_once './App/View/' . $view . '.php';
    }
}