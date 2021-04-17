<?php

namespace App\Services;

use App\Exceptions\UserNotAllowedException;
use App\Models\Task;

class TaskService
{

    public function create(string $label, int $is_completed, int $user_id)
    {
        $data = [
            'label'        => $label,
            'is_complete'  => $is_completed,
            'user_id'      => $user_id,
        ];

        $task = Task::create($data);
        return $task;
    }

    public function update(Task $task, string $label, int $is_completed, int $user_id)
    {
        $this->checkPermission($task, $user_id);

        $data = [
            'label'        => $label,
            'is_complete'  => $is_completed,
        ];

        $task->fill($data);
        $task->save();
        
        return $task->fresh();
    }

    public function destroy(Task $task, int $user_id)
    {
        $this->checkPermission($task, $user_id);
        return $task->delete();
    }

    /**
     * Check if user is allowed to do the action
     * @throws UserNotAllowedException
     */
    public function checkPermission(Task $task, int $user_id)
    {
        if ($task->user_id != $user_id)
        {
            throw new UserNotAllowedException();
        }
    }
}