<?php


namespace App\Scenario;


use App\Factories\TaskCollectionFactory;
use App\Http\Services\AmongTuskSpreadSheetClient;
use App\Models\Task;

class OneTaskPresentScenario
{
    public function __construct(
        private AmongTuskSpreadSheetClient $client,
        private TaskCollectionFactory $factory
    )
    {
    }

    public function get(): Task
    {
        $taskText = session('task');

        if ($taskText) {
            $task = new Task($taskText);
        } else {
            $collection = $this->factory->createFromTaskDataArray($this->client->getAllTaskText());
            $task = $collection->getOneAtRandom();
        }

        session(['task' => $task->toString()]);

        return $task;
    }
}
