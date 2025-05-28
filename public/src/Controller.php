<?php

class  Controller
{
    function runAction($actionName): void
    {
        if (method_exists($this, 'runBeforeAction')) {
            $res = $this->runBeforeAction();
            if (!$res) {
                return;
            }
        }

        $actionName .= 'Action';
        if (method_exists($this, $actionName)) {


            $this->$actionName();
        } else {
            include 'view/status-pages/404.html';
        }
    }
}