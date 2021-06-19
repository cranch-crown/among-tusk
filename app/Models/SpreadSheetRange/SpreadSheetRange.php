<?php


namespace App\Models\SpreadSheetRange;


class SpreadSheetRange
{
    private $sheetName;
    private $start;
    private $end;

    /**
     * SpreadSheetRange constructor.
     * @param SheetName $sheetName
     * @param Cell $start
     * @param Cell $end
     */
    public function __construct(SheetName $sheetName, Cell $start, Cell $end)
    {
        $this->sheetName = $sheetName;
        $this->start = $start;
        $this->end = $end;
    }

    public function toRangeArgumentFormat(): string
    {
        return "{$this->sheetName->toString()}!{$this->start->toString()}:{$this->end->toString()}";
    }
}
