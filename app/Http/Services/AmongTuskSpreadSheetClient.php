<?php


namespace App\Http\Services;


use App\Facades\SpreadSheetRangeFacade;
use App\Models\SpreadSheetRange\SpreadSheetRange;

class AmongTuskSpreadSheetClient
{
    const TASK_SHEET_NAME = '縛り管理';
    const API_DATA_SHEET_NAME = 'API用データ';
    const HEADER_COUNTING_CELL = 'A1';
    const TASK_COUNTING_CELL = 'A2';
    const TASK_DATA_COLUMN = 'A';

    private \Google_Service_Sheets $spreadSheetService;
    private string $spreadsheetId;

    public function __construct()
    {
        $this->spreadSheetService = new \Google_Service_Sheets($this->initializeGoogleClientInstance());
        $this->spreadsheetId = config('spreadsheet.spreadsheet_id');
    }

    private function initializeGoogleClientInstance(): \Google_Client
    {
        $googleClient = new \Google_Client();
        $googleClient->setApplicationName('Among Tusk');
        $googleClient->setScopes(\Google_Service_Sheets::SPREADSHEETS_READONLY);
        $googleClient->setAuthConfig(base_path(config('spreadsheet.service_json_key')));

        return $googleClient;
    }

    public function getOneTaskDataAtRandom(): string
    {
    }

    /**
     * スプレッドシートのヘッダ行数
     * @return int
     */
    private function getHeaderLineCount(): int
    {
        $headerCountingRange = SpreadSheetRangeFacade::create(self::API_DATA_SHEET_NAME, self::HEADER_COUNTING_CELL, self::HEADER_COUNTING_CELL);
        $data = $this->get($headerCountingRange);
        return $data[0];
    }

    public function getAllTaskCount(): int
    {
        $taskCountingRange = SpreadSheetRangeFacade::create(self::API_DATA_SHEET_NAME, self::TASK_COUNTING_CELL, self::TASK_COUNTING_CELL);
        $data = $this->get($taskCountingRange);
        return $data[0];
    }

    private function getAllTask(): array
    {
        $firstDataRow = $this->getHeaderLineCount() + 1;
        $fistDataCell = self::TASK_DATA_COLUMN . (string)$firstDataRow;

        $allTaskDataRage = SpreadSheetRangeFacade::create(self::TASK_SHEET_NAME, $fistDataCell, self::TASK_DATA_COLUMN);
        return $this->get($allTaskDataRage);
    }

    private function get(SpreadSheetRange $range): array
    {
        $response = $this->spreadSheetService->spreadsheets_values->get($this->spreadsheetId, $range->toRangeArgumentFormat());
        return $this->responseValuesToFlatArray($response->getValues());
    }

    private function responseValuesToFlatArray(array $values): array
    {
        $array = [];
        foreach ($values as $row) {
            $array = array_merge($array, $row);
        }

        return $array;
    }
}
