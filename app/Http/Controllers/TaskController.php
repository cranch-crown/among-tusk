<?php


namespace App\Http\Controllers;


use App\Scenario\OneTaskPresentScenario;

class TaskController extends Controller
{
    public function task(OneTaskPresentScenario $scenario): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('task', ['task' => $scenario->get()]);
    }

    public function raffle()
    {
        session(['task' => null]);
        return redirect('task');
    }
}
