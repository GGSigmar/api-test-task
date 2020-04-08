<?php

namespace App\Exception;

use Throwable;

class NotFoundException extends \Exception
{
    private const MESSAGE = "Entity '%s' not found, sorry!";

    public function __construct($entityType, $code = 404, Throwable $previous = null)
    {
        parent::__construct(sprintf(self::MESSAGE, $entityType), $code, $previous);
    }
}