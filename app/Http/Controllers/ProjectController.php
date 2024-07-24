<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProjectController extends Controller
{
    public function index() {
        return view('projects.index', [
            'projects' => Project::latest()->get(),
        ]);
    }

    public function add() {
        return view('projects.add');
    }

    public function save(Request $request) {
        $request->validate([
            'projectName' => ['required', 'string', 'max:255'],
            'customer' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'period' => ['required', 'string', 'max:255'],
            'projectDesc' => ['required', 'string', 'max:255'],
        ]);

        $projectId = IdGenerator::generate(['table' => 'projects', 'field' => 'projectId', 'length' => 10, 'prefix' => 'PRJ']);
        $userId = Auth::user()->id;


        Project::create([
            'projectId'         => $projectId,
            'projectName'       => $request->projectName,
            'customer'          => $request->customer,
            'address'           => $request->address,
            'period'            => $request->period,
            'projectDesc'       => $request->projectDesc,
            'userId'            => $userId,
        ]);

        return redirect(route('project.index', absolute: false))->with('success', 'Data successfully added');
    }

    public function edit(Project $project) {
        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    Public function update(Request $request, Project $project) {
        $request->validate([
            'projectName' => ['required', 'string', 'max:255'],
            'customer' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'period' => ['required', 'string', 'max:255'],
            'projectDesc' => ['required', 'string', 'max:255'],
        ]);

        Project::where('projectId', $project->projectId)->update([
            'projectName'       => $request->projectName,
            'customer'          => $request->customer,
            'address'           => $request->address,
            'period'            => $request->period,
            'projectDesc'       => $request->projectDesc

        ]);

        return redirect(route('project.index', absolute: false))->with('success', 'Data successfully updated');
    }
}
