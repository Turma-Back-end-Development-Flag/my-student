<?php

/*
API - Aplication Public/Programming Interface
---------

*/

class Calculator
{
  public function getSum()
  {
    return 2 + $this->getRandomNumber();
  }

  private function getRandomNumber()
  {
    return 42;
  }
}

$calc = new Calculator();

// chamar metodo publico
echo $calc->getSum();

// chamar metodo privado
echo $calc->getRandomNumber();
