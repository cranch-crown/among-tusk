<?php


namespace App\Facades;


use App\Models\SpreadSheetRange\Cell;
use App\Models\SpreadSheetRange\SheetName;
use App\Models\SpreadSheetRange\SpreadSheetRange;

class SpreadSheetRangeFacade
{
    public static function create(string $sheetName, string $start, string $end): SpreadSheetRange
    {
        $sheet = new SheetName($sheetName);
        $start = new Cell($start);
        $end = new Cell($end);

        return new SpreadSheetRange($sheet, $start, $end);
    }
}
