<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowIdNotFoundException extends NotFoundHttpException
{
  public function __construct(string $object_type, \Throwable $previous = null)
  {
    $message = "$object_type not found in database";

    parent::__construct($message, $previous);
  }
}
