<!--1. Придумать класс, который описывает любую сущность из предметной области -->
<!--интернет-магазинов: продукт, ценник, посылка и т.п.-->
<!--2. Описать свойства класса из п.1 (состояние).-->
<!--3. Описать поведение класса из п.1 (методы).-->
<!--4. Придумать наследников класса из п.1. Чем они будут отличаться?-->


<?php
// раса Эльф
class Elf
{
    public $name;
    public $health;
    public $skill;

    public function __construct($name=null, $health=null, $skill=null)
    {
        $this->name = $name;
        $this->health = $health;
        $this->skill = $skill;
    }

    protected function renderName()
    {
        return "<b>{$this->name}</b>";
    }

    public function speak() {
        // Привет. Меня зовут .... Я обладаю способностью ....
        echo "Hi, my name is " . $this->renderName() . ". My skill is a {$this->skill}.<br>";
    }
}

// класс Маг
class Mage extends Elf
{
    public $heal;

    public function __construct($name=null, $health=null, $skill=null, $heal=null)
    {
        parent::__construct($name, $health, $skill);
        $this->heal = $heal;
    }

    public function speak() {
        parent::speak();
        // Также я могу увеличить здоровье на ....
        echo "Also I can heal at {$this->heal} points.<br>";
    }

    public function heal(Warrior $warrior)
    {
        $warrior->health += $this->heal;
        // ... увеличил(а) здоровье ... на ....
        echo "{$this->name} has healed {$warrior->name} at {$this->heal} points.";
    }
}

// класс воин
class Warrior extends Elf
{
    public $damage;

    public function __construct($name=null, $health=null, $skill=null, $damage=null)
    {
        parent::__construct($name, $health, $skill);
        $this->damage = $damage;
    }

    public function speak() {
        parent::speak();
        // Я убью тебя. Готовься к смерти!
        echo "I will kill you. Prepare to die!<br>";
    }
}

$mage = new Mage('Athene', 80, 'flame blast', 20);
$mage->speak();

$warrior = new Warrior('Gunnar', 120, 'shield bash', 40);
$warrior->speak();
$mage->heal($warrior);
