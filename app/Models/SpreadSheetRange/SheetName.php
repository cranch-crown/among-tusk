<?php


namespace App\Models\SpreadSheetRange;


class SheetName
{
    public function __construct(private string $name)
    {
    }

    public function toString(): string
    {
        return $this->name;
    }
}
