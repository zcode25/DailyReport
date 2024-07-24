<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProjectDetailController extends Controller
{
    public function index(Project $project) {

        $reports = Report::latest()->get();

        // dd($reports);

        return view('projectDetails.index', [
            'project' => $project,
            'reports' => $reports,
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

        $reportId = IdGenerator::generate(['table' => 'reports', 'field' => 'reportId', 'length' => 20, 'prefix' => 'RPT-'. date('y-m-d', strtotime($request->date)) . '-']);
        $userId = Auth::user()->id;

        Report::create([
            'reportId' => $reportId,
            'projectId' => $project->projectId,
            'date' => $request->date,
            'userId' => $userId,
        ]);

        return redirect(route('projectDetail.index', ['project' => $project->projectId], absolute: false))->with('success', 'Data successfully updated');

    }
}
