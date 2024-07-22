<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProjectDetailController extends Controller
{
    public function index(Project $project) {
        return view('projectDetails.index', [
            'project' => $project
        ]);
    }

    public function add(Project $project) {
        return view('projectDetails.add', [
            'project' => $project
        ]);
    }

    public function save(Request $request, Project $project) {
        $request->validate([
            'date' => ['required']
        ]);

        $reportId = IdGenerator::generate(['table' => 'reports', 'field' => 'reportId', 'length' => 20, 'prefix' => 'RPT/'. date('y/m/d', strtotime($request->date)) . '/']);
        
        Report::create([
            'reportId' => $reportId,
            'projectId' => $project->projectId,
            'date' => $request->date,
        ]);

        return redirect(route('projectDetail.index', ['project' => $project->projectId], absolute: false))->with('success', 'Data successfully updated');

    }
}
