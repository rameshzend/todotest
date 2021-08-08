<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use Mail;

class TaskSchedulerController extends Controller
{
    /**
     * Sending email reminders to the task owner
     *
     * @return void
     */
    public function getScheduledReminders()
    {
        /**
         * Fetch all incomplete todo tasks for which reminders are scheduled for today, 
         * assuming that reminders are sent daily once
         */

        $today = date('Y-m-d', time());

        $scheduledTasks = Task::all()
                    ->where('status', 0)
                    ->where('reminder_date', $today);
        
        if(count($scheduledTasks) > 0) {
            foreach($scheduledTasks as $scheduledTask) {
                try {
                    $task = Task::find($scheduledTask->id);

                    /**
                     * Get the user info
                     */
                    $user = $task->user;

                    $emailInfo = [
                        "to" => $user->email,
                        "name" => $user->name,
                        "from" => "reminders@todotest.com",
                        "title" => $scheduledTask->title,
                        "body" => $scheduledTask->body,
                        "attachment" => $scheduledTask->attachment,
                        "replyto" => "do-not-reply@todotest.com",
                    ];

                    $this->sendEmail($emailInfo);
                    
                    /**
                     * Update the status to complete
                     */
                    $task->status = 1;
                    $task->save();
                } catch (Exception $e) {
                    // Log errors
                }
            }
        }
    }

    /**
     * Get the email template and send email 
     * @param array  $emailInfo
     * @return void
     */
    public function sendEmail($emailInfo)
    {
        $data["email"] = $emailInfo['to'];
        $data["title"] = $emailInfo['title'];
        $data["body"] = $emailInfo['body'];
 
        $files = [
            public_path('attachments/'. $emailInfo['attachment']),
        ];
        
        /**
         * Send mail
         */
        Mail::send('reminders.todo_task', $data, function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }            
        });

        // log message "Mail send successfully to $data["email"] !!";
    }
}
