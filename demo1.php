<?php

abstract class Employee
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function fire();
}

class Minion extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll clear my desk\n";
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

class CluedUp extends Employee
{
    public function fire()
    {
        print "{$this->name}: I'll call my lawyer\n";
    }
}

// 运行
$boss = new NastyBoss();
$boss->addEmployee(new Minion('harry'));
$boss->addEmployee(new Minion('bob'));
$boss->addEmployee(new CluedUp('mary'));
$boss->projectFailed();
$boss->projectFailed();
$boss->projectFailed();
