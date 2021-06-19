<?php


namespace App\Models\SpreadSheetRange;


class Cell
{
    public function __construct(private string $cell)
    {
    }

    public function toString(): string
    {
        return $this->cell;
    }
}
