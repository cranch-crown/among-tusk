<?php


namespace App\Http\Controllers;


class TaskPageController extends Controller
{
    public function __invoke()
    {
        return view('task');
    }
}
