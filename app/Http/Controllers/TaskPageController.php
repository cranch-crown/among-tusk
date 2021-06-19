<?php


namespace App\Http\Controllers;


use App\Scenario\OneTaskPresentScenario;

class TaskPageController extends Controller
{
    public function __invoke(OneTaskPresentScenario $scenario)
    {
        $task = $scenario->get();
        return view('task', compact('task'));
    }
}
