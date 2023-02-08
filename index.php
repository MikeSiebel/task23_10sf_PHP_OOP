<?php

interface GoEhead //двигаюсь вперёд
{
    public static function goEhead();
}
interface GoBack //двигаюсь назад
{
    public static function goBack();
}
interface Action //реализация способности активного действия
{
    public function action();
}
interface Signal //сигнал
{
    public static function signal();
}
interface Wipers //стеклочиститель
{
    public static function wipers();
}

abstract class Technic implements GoEhead, GoBack, Action, Signal, Wipers
{
    protected  $action; 
    
    public static function goEhead()
    {
        echo 'Двигаюсь вперёд' . "<br>";
    }
    public static function goBack()
    {
        echo 'Двигаюсь назад' . "<br>";
    }
    public function action()
    {
        echo $this->action . "<br>";
    }
    public static function signal()
    {
        echo 'Beep-beep!' . "<br>";
    }
    public static function wipers()
    {
        echo 'Работает стеклочиститель' . "<br>";
    }
}

class Car extends Technic
{
    protected static $type = 'автомобиль';
    protected $action = 'Турбо N2O - режим турбо на закиси азота';
    protected $individual = 'Премиум класс, - кожаный салон';
    public function actionTechnic()
    {
        $this->action();
    }
    public function individual()
    {
        echo $this->individual . "<br>";
    }
}

class Bulldozer extends Technic
{
    protected static $type = 'бульдозер';
    protected $action = 'Управляю отвалом (лопатой)';
    protected $individual = 'Умею убирать снег';
    public function actionTechnic()
    {
        $this->action();
    }
    public function individual()
    {
        echo $this->individual . "<br>";
    }
}

$car1 = new Car();
$go1 = 1;

$bulldozer2 = new Bulldozer();
$go2 = -1;

function testTechnic($technic, $go)
{
    $go > 0 ? $technic::goEhead() : $technic::goBack();
    $technic->actionTechnic();
    $technic::signal();
    $technic::wipers();
    $technic->individual();
}

testTechnic($car1, $go1);
testTechnic($bulldozer2, $go2);