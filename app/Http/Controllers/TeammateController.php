<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TeammateController extends Controller
{
    public function dashboard(){
        return view('teammate.dashboard');
    }

    // list of assigned tasks
    public function assignedTasks(Request $request){
        $tasks = Task::query()->where('teammate_id', auth()->user()->id);

        if ($request->has('project_id') && !empty($request->project_id)) {
            $tasks->where('project_id', $request->project_id);
        }

        if ($request->has('status') && !empty($request->status)) {
            $tasks->where('status', $request->status);
        }

        $tasks = $tasks->with('project','teammate')->paginate(10);
        $projects = Project::all();
        return view('teammate.tasks.assigned-tasks',compact('tasks', 'projects'));
    }

    // view assigned task
    public function viewTask($id){
        $task = Task::with('project','teammate')->findOrFail($id);
        return view('teammate.tasks.view-task', compact('task'));
    }

    // update task status
    public function updateTaskStatus(Request $request){
        $request->validate([
            'status' => ['required']
        ]);

        $task = Task::findOrFail($request->task_id);
        $task->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Task status updated successfully.');
    }
}
