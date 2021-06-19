<?php


namespace App\Http\Controllers;


use App\Http\Services\AmongTuskSpreadSheetClient;

class RootPageController extends Controller
{
    public function __invoke(AmongTuskSpreadSheetClient $client)
    {
        return view('root', ['taskCount' => $client->getAllTaskCount()]);
    }
}
