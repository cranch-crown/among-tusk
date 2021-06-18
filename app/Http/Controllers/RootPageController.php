<?php


namespace App\Http\Controllers;


class RootPageController extends Controller
{
    public function __invoke()
    {
        $n = 1;
        return view('root', compact('n'));
    }
}
