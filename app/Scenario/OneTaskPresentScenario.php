<?php


namespace App\Scenario;


use App\Factories\TaskFactory;
use App\Http\Services\AmongTuskSpreadSheetClient;
use App\Models\Task;

class OneTaskPresentScenario
{
    public function __construct(private AmongTuskSpreadSheetClient $client, private TaskFactory $factory)
    {
    }

    public function get(): Task
    {
        $this->client->getOneTaskDataAtRandom();

        $task = $this->factory->create($this->client->getOneTaskDataAtRandom());
        return $task;
    }
}
