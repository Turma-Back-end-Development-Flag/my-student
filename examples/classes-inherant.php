<?php

interface Drivable {
  public function drive();
  public function stop();
}

interface Flyable {
  public function fly();
  public function land();
}

abstract class Vehicle
{
  public $brand;
  public $model;
  public $color;
}

class Car extends Vehicle implements Drivable
{
  public function drive()
  {
    echo "I'm driving a car\n";
  }

  public function stop()
  {
    echo "Just stopped the car!\n";
  }

  public function clean_window() {

  }
}

$car123 = new Car();
//$car123->drive();

class AirPlane extends Vehicle implements Drivable, Flyable {
  public function drive()
  {
    echo "I'm driving an airplane\n";
  }
  public function stop()
  {
    echo "Just stopped the airplane!\n";
  }
  public function fly()
  {
    echo "I'm flying $this->brand\n";
  }
  public function land()
  {
    echo "Just landed!\n";
  }
}

class Bike extends Vehicle {
  public function drive()
  {
    echo "I'm driving a bike";
  }
  public function stop()
  {
    echo "Just stopped the bike!";
  }
}

class FourWheelCar extends Car {
  public $number_of_wheels = 4;
}

/*$my_car = new FourWheelCar();
$my_car->drive();
var_dump($my_car->number_of_wheels);*/

class Airport {
  public $airplanes = [];
  public $cars = [];

  public function add_airplane(Flyable $airplane) {
    $this->airplanes[] = $airplane;
  }

  public function add_car(Drivable $car) {
    $this->cars[] = $car;
  }

  public function drive_cars() {
    foreach ($this->cars as $car) {
      $car->drive();
    }
  }

  public function add_airplane_copy(Flyable $airplane) {
    $new_airplane = clone $airplane;

    $this->add_airplane($new_airplane);
  }

  public function fly_one(Flyable $airplane) {
    foreach ( $this->airplanes as $our_airplane ) {
      if ($our_airplane === $airplane) {
        $our_airplane->fly();
      } else {
        $our_airplane->land();
      }
    }
  }

  public function fly_all() {
    foreach ( $this->airplanes as $airplane ) {
      $airplane->fly();
    }
  }
}

// Comecemos o jogo!

// Vamos criar um aeroporto
$airport = new Airport();

// Vamos criar dois aviões
$airplane1 = new AirPlane();
$airplane1->brand = "Boeing";

$airplane2 = new AirPlane();
$airplane2->brand = "Airbus";

$airport->add_airplane_copy($airplane1);
$airport->add_airplane($airplane2);

$airplane1->brand = "Batatas";

var_dump($airport->airplanes);

//$airport->fly_all();

$airport->fly_one($airplane1);

/*
$car1 = new Car();
$airport->add_car($car1);
$airport->add_car($airplane1);

$airport->drive_cars();

*/
