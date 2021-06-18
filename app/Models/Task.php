<?php


namespace App\Models;


class Task
{
    private $description;

    /**
     * Task constructor.
     * @param string $description
     */
    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function toString(): string
    {
        return $this->description;
    }
}
