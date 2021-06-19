<?php


namespace App\Exceptions;


class InvalidStringException extends \Exception
{
    public function __construct(string $string)
    {
        $message = "Invalid string {$string} was passed to CellLocation class.";
        parent::__construct($message, 400);
    }
}
