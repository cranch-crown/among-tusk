<?php


namespace App\Models;


class TaskCollection
{
    private array $tasks;

    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
    }

    public function getOneAtRandom(): Task
    {
        $length = count($this->tasks);
        $key = rand(0, $length - 1);

        return $this->tasks[$key];
    }
}
