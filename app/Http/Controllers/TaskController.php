<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;




class TaskController extends Controller
{
    // Handle both GET and POST requests
    public function handleTodo(Request $request)
    {
        if ($request->isMethod('post')) {
            // If POST request, store the new task
            $request->validate([
                'task' => 'required|string|max:255', // Validation
            ]);

            $todo = new Todo();
            $todo->task = $request->task;
            $todo->completed = false; // Set the task as not completed by default
            $todo->save();

            // Redirect to avoid form resubmission issues
            return redirect('/todo');
        }

        // If GET request, retrieve and show all tasks
        $list = Todo::all();

        // Return the view with the task list
        return View::make('todo')->with('list', $list);
    }



    public function updateTask(Request $request, $id)
    {
        // Find the task by its ID
        $todo = Todo::find($id);

        // If the task exists, update the 'completed' status
        if ($todo) {
            $todo->completed = $request->has('completed');
            $todo->save();
        }

        // Redirect back to the list
        return redirect('/todo');
    }


    public function deleteTask($id)
    {
        // Find the task by its ID and delete it
        $todo = Todo::find($id);

        if ($todo) {
            $todo->delete();
        }

        // Redirect back to the list
        return redirect('/todo');
    }


    public function editTask(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        // Find the task by its ID
        $todo = Todo::find($id);

        // If the task exists, update the task description
        if ($todo) {
            $todo->task = $request->task;
            $todo->save();
        }

        // Redirect back to the task list
        return redirect('/todo');
    }
}
