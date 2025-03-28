<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // list of projects 
    public function listProjects(Request $request){
        $projects = Project::query();

        if ($request->has('name') && !empty($request->name)) {
            $projects->where('name', 'LIKE', "%{$request->name}%");
        }

        if ($request->has('teammate_id') && !empty($request->teammate_id)) {
            $projects->whereHas('tasks', function ($query) use ($request) {
                $query->where('teammate_id', $request->teammate_id);
            });
        }

        if ($request->has('task_id') && !empty($request->task_id)) {
            $projects->whereHas('tasks', function ($q) use ($request) {
                $q->where('id', $request->task_id);
            });
        }

        $projects = $projects->with('tasks')->paginate(10);
        $teammates = User::where('role', '2')->get();
        $tasks = Task::get();
        return view('manager.projects.list-project',compact('projects','teammates','tasks'));
    }

    // create project page
    public function createProject(){
        return view('manager.projects.create-project');
    }

    // store project page
    public function storeProject(Request $request){
        $request->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'string' , 'unique:'.Project::class]
        ]);

        $project = Project::create([
            'name' => $request->name,
            'code' => $request->code,
            'manager_id' => auth()->id()
        ]);

        return redirect()->route('manager.list-projects')->with('success', 'Project created successfully.');
    }
}
