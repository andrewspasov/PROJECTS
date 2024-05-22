<?php

class Furniture
{
    private $width;
    private $length;
    private $height;
    private $is_for_seating;
    private $is_for_sleeping;

    public function __construct(int $width, int $height, int $length)
    {
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
    }

    public function setForSeat($is_for_seating)
    {
        $this->is_for_seating = $is_for_seating;
    }
    public function getForSeat()
    {
        return $this->is_for_seating;
    }
    public function setForSleep($is_for_sleeping)
    {
        $this->is_for_sleeping = $is_for_sleeping;
    }
    public function getForSleep()
    {
        return $this->is_for_sleeping;
    }

    public function area()
    {
        return $this->width * $this->length;
    }

    public function volume()
    {
        return $this->area() * $this->height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getLength()
    {
        return $this->length;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }
}

$object1 = new Furniture(42, 32, 55);

$object1->setForSeat(true);
// echo $object1->getForSeat();

$object1->setForSleep(false);
// echo $object1->getForSleep();

echo $object1->getHeight();
echo "<br>";
echo $object1->getLength();
echo "<br>";
echo $object1->getWidth();
echo "<br>";
echo $object1->area();
echo "<br>";
echo $object1->volume();
echo "<br>";


class Sofa extends Furniture
{
    public $seats;
    protected $armrests;
    private $length_opened;

    public function __construct(int $width, int $height, int $length)
    {
        parent::__construct($width, $height, $length);
    }

    public function setSeats($seats)
    {
        $this->seats = $seats;
    }
    public function getSeats()
    {
        return $this->seats;
    }
    public function setArmrests($armrests)
    {
        $this->armrests = $armrests;
    }
    public function getArmrests()
    {
        return $this->armrests;
    }
    public function setLengthOpened($length_opened)
    {
        $this->length_opened = $length_opened;
    }
    public function getLengthOpened()
    {
        return $this->length_opened;
    }

    public function area_opened($sofa = false)
    {
        return $sofa ? $this->getWidth() * $this->length_opened : 'This sofa is for sitting only, it has ' . $this->armrests . ' armrests and ' . $this->seats . ' seats.';
    }


    public function print()
    {
        echo get_class($this) . ", " . ($this->getForSleep() ? "sleeping" : "sitting only") . ", " . $this->area() . "cm2" . "<br>";
    }

    public function sneakpeek()
    {
        echo get_class($this) . "<br>";
    }

    public function fullinfo()
    {
        echo get_class($this) . ", " . ($this->getForSleep() ? "sleeping" : "sitting-only") . ", " . $this->area() . "cm2, width: {$this->getWidth()}cm, length: {$this->getLength()}cm, height: {$this->getHeight()}cm" . "<br>";
    }
}

echo "<br>";

$sofa = new Sofa(12, 41, 53);
$sofa->setSeats(25);
$sofa->setArmrests(30);
$sofa->getWidth();
$sofa->setLengthOpened(10);
echo "<br>";
echo $sofa->area_opened(false);
echo "<br>";


echo $sofa->area();
echo "<br>";
echo $sofa->volume();
echo "<br>";
echo $sofa->area_opened(true);


$sofa->setForSeat(false);
$sofa->setForSleep(true);

echo "<br>";
echo "<br>";


$sofa->print();
$sofa->sneakpeek();
$sofa->fullinfo();

class Bench extends Sofa
{
    public function __construct(int $width, int $height, int $length)
    {
        parent::__construct($width, $height, $length);
    }

    // Implement methods from Printable interface
    public function print()
    {
        echo get_class($this) . ", " . ($this->getForSleep() ? "sleeping" : "sitting only") . ", " . $this->area() . "cm2" . "<br>";
    }

    public function sneakpeek()
    {
        echo get_class($this) . "<br>";
    }

    public function fullinfo()
    {
        echo get_class($this) . ", " . ($this->getForSleep() ? "sleeping" : "sitting-only") . ", " . $this->area() . "cm2, width: {$this->getWidth()}cm, length: {$this->getLength()}cm, height: {$this->getHeight()}cm" . "<br>";
    }
}
echo "<br>";


$bench = new Bench(150, 60, 80);
$bench->setForSeat(true);
$bench->setForSleep(false);
$bench->setSeats(2);
$bench->setArmrests(0);
$bench->setLengthOpened(0);
$bench->print();
$bench->sneakpeek();
$bench->fullinfo();
echo "<br>";



class Chair extends Furniture
{

    public function __construct(int $width, int $height, int $length)
    {
        parent::__construct($width, $height, $length);
    }

    public function print()
    {
        echo get_class($this) . ", " . ($this->getForSleep() ? "sleeping" : "sitting only") . ", " . $this->area() . "cm2" . "<br>";
    }

    public function sneakpeek()
    {
        echo get_class($this) . "<br>";
    }

    public function fullinfo()
    {
        echo get_class($this) . ", " . ($this->getForSleep() ? "sleeping" : "sitting-only") . ", " . $this->area() . "cm2, width: {$this->getWidth()}cm, length: {$this->getLength()}cm, height: {$this->getHeight()}cm" . "<br>";
    }
}

$chair = new Chair(50, 50, 100);
$chair->setForSeat(true);
$chair->setForSleep(false);
$chair->print();
$chair->sneakpeek();
$chair->fullinfo();

interface Printable
{
    public function print();
    public function sneakpeak();
    public function fullinfo();
}
