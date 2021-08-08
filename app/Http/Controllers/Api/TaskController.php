<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the todo tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::all();
        
        /**
         * Fetch todo tasks with a complete/incomplete filter
         */
        if ($request->has('status') && $request->status != null) {
            $tasks = $tasks->where('status', $request->status);
        }

        return response(['tasks' => TaskResource::collection($tasks), 'message' => 'Tasks have been retrieved successfully'], 200);
    }

    /**
     * Create a new todo task.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required',
            'title' => 'required|max:255',
            'body' => 'required',
            'due_date' => 'required',
            'reminders' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $reminderDate = $this->getReminderDate($request->due_date, $request->reminders);

        $data['reminder_date'] = $reminderDate;

        $task = Task::create($data);

        return response(['task' => new TaskResource($task), 'message' => 'Task has been created successfully'], 201);
    }

    /**
     * Display the specified todo task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response(['task' => new TaskResource($task), 'message' => 'Task has been retrieved successfully'], 200);
    }

    /**
     * Update the specified todo task.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->all();

        if (($request->has('due_date') && $request->due_date != null) || ($request->has('reminders') && $request->reminders != null)) {
            $reminders = "";
            $dueDate = "";

            if($request->reminders) {
                $reminders = $request->reminders;
            }else{
                $reminders = $task->reminders;
            }

            if($request->due_date) {
                $dueDate = $request->due_date;
            }else{
                $dueDate = $task->due_date;
            }
            
            $reminderDate = $this->getReminderDate($dueDate, $reminders);
            $data['reminder_date'] = $reminderDate;
        }

        $task->update($data);

        return response(['task' => new TaskResource($task), 'message' => 'Task has been updated successfully'], 200);
    }

    /**
     * Remove the specified todo task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response(['message' => 'Task has been deleted']);
    }

    /**
     * Get the reminder date from due date and reminders
     *
     * @param string $dueDate
     * @return void
     */
    public function getReminderDate($dueDate, $reminder)
    {
        $reminderDate = "";

        /**
         * reminders are saved in database like '1 days', '1 weeks'
         */
        $reminder = "-$reminder";

        $reminderDate = date('Y-m-d',strtotime($dueDate . $reminder));

        return $reminderDate;
    }
}
