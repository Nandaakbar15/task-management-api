<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    // get all task data
    public function index()
    {
        $task = Tasks::all();
        return response()->json([
            'statusCode' => 200,
            'data' => $task
        ], 200);
    }

    // add new task
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required'
        ]);

        if($validate->fails()) {
            return response()->json([
                'statusCode' => 200,
                'errors' => $validate->errors()
            ], 400);
        }

        $task = Tasks::create($request->all());

        return response()->json([
            'statusCode' => 200,
            'message' => 'New tasks is added!',
            'data' => $task
        ], 200);
    }

    // get tasks based on ID
    public function show(Tasks $tasks)
    {
        if(!$tasks) {
            return response()->json([
                'statusCode' => 200,
                'message' => "Tasks is not found!"
            ], 400);
        }

        return response()->json([
            'statusCode' => 200,
            'data' => $tasks
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $tasks)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required'
        ]);

        if($validate->fails()) {
            return response()->json([
                'statusCode' => 200,
                'errors' => $validate->errors()
            ], 400);
        }

        $tasks->update($request->all());

        return response()->json([
            'statusCode' => 200,
            'message' => 'New tasks is added!',
            'data' => $tasks
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        $tasks->delete();
        return response()->json([
            'statusCode' => 200,
            'message' => 'Tasks is deleted!',
        ], 200);
    }
}
