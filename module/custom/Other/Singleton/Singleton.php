<?php

abstract class Singleton
{
    protected static $_instance;

    private function __construct() {}
    private function __clone() {}

    public final static function getInstance() {
        if (null === static::$_instance) {
            static::$_instance = new static();
        }

        return static::$_instance;
    }
}