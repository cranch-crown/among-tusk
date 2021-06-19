<?php


namespace App\Factories;


use App\Models\Task;
use App\Models\TaskCollection;

class TaskCollectionFactory
{
    public function createFromTaskDataArray(array $data): TaskCollection
    {
        $collection = new TaskCollection();

        foreach ($data as $text)
        {
            $collection->addTask(new Task($text));
        }

        return $collection;
    }
}
