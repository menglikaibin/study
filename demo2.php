<?php

abstract class Employee
{
    protected $name;

    private static $types = ['Minion', 'CluedUp', 'WellConnected'];

    // 接收一个名称字符串作为参数,并用它随机地实例化一个Employee子类型.
    public static function recruit(string $name)
    {
        $num = rand(1, count(self::$types)) - 1;
        $class = __NAMESPACE__ . "\\" . self::$types[$num];

        return new $class($name);
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function fire();
}

class WellConnected extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll call my dad\n";
    }
}

class Minion extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll clear my desk\n";
    }
}

class CluedUp extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll call my lawyer\n";
    }
}

class NastyBoss
{
    private $employees = [];

    public function addEmployee(Employee $employee)
    {
        // 每个员工都是一个对象,拥有Minion和Employee的方法和属性
        $this->employees[] = $employee;
    }

    public function projectFailed()
    {
        if (count($this->employees) > 0) {
            // 抛出第一个员工,执行fire方法
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}

$boss = new NastyBoss();
$boss->addEmployee(Employee::recruit('bob'));
$boss->addEmployee(Employee::recruit('harry'));
$boss->addEmployee(Employee::recruit('mary'));
$boss->projectFailed();
$boss->projectFailed();
$boss->projectFailed();
