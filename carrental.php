<?php

class CarRental 
{
    private $make = 'Dodge';
    private $model  = 'Challenger';
    private static $car = NULL;
    private static $isRented = FALSE;

    private function __construct() 
    {

    }

    static function rentCar() 
    {
      if (FALSE == self::$isRented) 
      {
        if (NULL == self::$car) 
        {
           self::$car = new CarRental();
        }
        self::$isRented = TRUE;
        return self::$car;
      } else 
      {
        return NULL;
      }
    }

    function returnCar(CarRental $carReturned) 
    {
        self::$isRented = FALSE;
    }

    function getMake() 
    {
        return $this->make;
    }

    function getModel() 
    {
        return $this->model;
    }

    function getMakeAndModel() 
    {
      return $this->getMake() . $this->getModel();
    }
  }
 
class CarRenter 
{
    private $rentedCar;
    private $haveCar = FALSE;

    function __construct() 
    {

    }

    function getMakeAndModel() 
    {
      if (TRUE == $this->haveCar) 
      {
        return $this->rentedCar->getMakeAndModel();
      } else 
      {
        return "Car not available";
      }
    }

    function rentCar() 
    {
      $this->rentedCar = CarRental::rentCar();
      if ($this->rentedCar == NULL) 
      {
        $this->haveCar = FALSE;
      } else 
      {
        $this->haveCar = TRUE;
      }
    }

    function returnCar() 
    {
      $this->rentedCar->returnCar($this->rentedCar);
    }
}

  function writeln($line_in) 
  {
    echo $line_in.'<br/>';
  }
 
  $carRenter1 = new CarRenter();
  $carRenter2 = new CarRenter();

  $carRenter1->rentCar();
  writeln('carRenter1 has sumbitted car rental request');
  writeln('carRenter1 Make and Model: ');
  writeln($carRenter1->getMakeAndModel());
  writeln('');

  $carRenter2->rentCar();
  writeln('carRenter2 has submitted car rental request');
  writeln('carRenter2 Make and Model: ');
  writeln($carRenter2->getMakeAndModel());
  writeln('');

  $carRenter1->returnCar();
  writeln('carRenter1 returned the car');
  writeln('');

  $carRenter2->rentCar();
  writeln('carRenter2 Make and Model: ');
  writeln($carRenter1->getMakeAndModel());
  writeln('');
  
?>