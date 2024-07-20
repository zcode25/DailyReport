<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
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
            'projectAddress' => ['required', 'string', 'max:255'],
            'customer' => ['required', 'string', 'max:255'],
            'projectDesc' => ['required', 'string', 'max:255'],
        ]);

        $projectId = IdGenerator::generate(['table' => 'projects', 'field' => 'projectId', 'length' => 10, 'prefix' => 'PRJ']);

        Project::create([
            'projectId'         => $projectId,
            'projectName'       => $request->projectName,
            'projectAddress'    => $request->projectAddress,
            'customer'          => $request->customer,
            'projectDesc'       => $request->projectDesc

        ]);

        return redirect(route('project.index', absolute: false))->with('success', 'Data successfully added');
    }
}
