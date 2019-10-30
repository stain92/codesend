<?php


namespace Http;


abstract class HttpAbstracts3
{
    protected function redirect(string $url)
    {
        header('Location: '.$url);
        exit;
    }
}