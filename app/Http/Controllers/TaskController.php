<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // list of tasks
    public function listTasks(Request $request){
        $tasks = Task::query();

        if ($request->has('project_id') && !empty($request->project_id)) {
            $tasks->where('project_id', $request->project_id);
        }

        if ($request->has('status') && !empty($request->status)) {
            $tasks->where('status', $request->status);
        }

        $tasks = $tasks->with('project','teammate')->paginate(10);
        $projects = Project::all();
        return view('manager.tasks.list-tasks', compact('tasks', 'projects'));
    }

    // create task page
    public function createTask(){
        $projects = Project::all();
        $teammates = User::where('role', '2')->get();
        return view('manager.tasks.create-task', compact('projects', 'teammates'));
    }

    // store task page
    public function storeTask(Request $request){
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['string'],
            'project_id' => ['required', 'string'],
            'teammate_id' => ['required', 'string'],
            'status' => ['required']
        ]);

        $task=Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'project_id' => $request->project_id,
            'teammate_id' => $request->teammate_id
        ]);

        return redirect()->route('manager.list-tasks')->with('success', 'Task created successfully');
    }
}
