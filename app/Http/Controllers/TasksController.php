<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status' => 'OK', 'data' => Task::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->task_type_id = $request->task_type_id;
        $task->task_priority_id = $request->task_priority_id;
        $task->due_date = $request->due_date;
        $task->save();

        // Optionally, you can return a response indicating the success of the update
        return response()->json(['message' => 'Task added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->issue_type = $request->issue_type;
        $task->priority = $request->priority;
        $task->status_id = $request->status_id;
        $task->save();

        // Optionally, you can return a response indicating the success of the update
        return response()->json(['message' => 'Task status updated successfully']);
    }

    public function updateTaskStatus(Request $request, $id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Update the task status
        $task->status_id = $request->status_id;
        $task->save();

        // Optionally, you can return a response indicating the success of the update
        return response()->json(['message' => 'Task status updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			$task = Task::findOrFail($id);
			if(!$task){
				return response()->json(['message'=> 'Task not found'], 400);
			}

			try {
				$task->delete();
				return response()->json(['message'=> 'Task deleted successfully']);
			}catch (\Exception $e){
				return response()->json(['error'=> 'Failed to delete task'], 500);
			}
    }
}

