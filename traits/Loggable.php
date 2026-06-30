<?php

trait Loggable
{
    public function log($mensagem)
    {
        echo "[" .
            date("d/m/Y H:i:s") .
            "] " .
            $mensagem .
            "<br>";
    }
}