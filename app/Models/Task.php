<?php


namespace App\Models;


class Task
{
    /**
     * Task constructor.
     * @param string $text
     */
    public function __construct(private string $text)
    {
    }

    public function toString(): string
    {
        return $this->text;
    }
}
