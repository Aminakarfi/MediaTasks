<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User; // Import the User model to associate tasks with users

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
        'day' => 'required|string',
        'type' => 'required|string',
        'task' => 'required|string',
        ]);

        // Retrieve user by ID
        $user = User::findOrFail($request->user_id);

        // Save task in the database with the user ID
        $task = Task::create([
            'user_id' => $user->id,  // Assign the task to the user
            'day' => $request->day,
            'type' => $request->type,
            'task' => $request->task,
        ]);

        // Return success message with the task data
        return response()->json([
            'message' => 'Task saved successfully',
            'task' => $task,
        ]);
    }
}
