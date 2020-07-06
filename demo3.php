<?php

class Preferences
{
    private $props = [];

    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }

        return self::$instance;
    }

    public function setProperty(string $key, string $val)
    {
        $this->props[$key] = $val;
    }

    public function getProperty(string $key): string
    {
        return $this->props[$key];
    }
}

// 实现一个无法外部进行实例化的类,设置construct方法为private
$pref = Preferences::getInstance();
$pref->setProperty('name', 'matt');
unset($pref); // 移除引用
$pref2 = Preferences::getInstance();
print $pref2->getProperty("name") . "\n"; // 证实了属性没有丢失