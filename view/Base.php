<?php
class Base 
{
    function render($view) {
    { 
        $view = $view . ".html";
        if (! is_file($view)) {
             throw new \InvalidArgumentException("A view " . $view . " não foi encontrada");
        }
        require_once($view);
    }
}
