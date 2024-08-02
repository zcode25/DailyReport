<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Project;
use App\Models\Reporter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProjectDetailController extends Controller
{
    public function index(Project $project) {

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $reports = Report::where('projectId', $project->projectId)->latest()->get();
        $reporters = Reporter::where('projectId', $project->projectId)->latest()->get();

        // dd($reports);

        return view('projectDetails.index', [
            'project' => $project,
            'reports' => $reports,
            'reporters' => $reporters,
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

        // $reportId = IdGenerator::generate(['table' => 'reports', 'field' => 'reportId', 'length' => 20, 'prefix' => 'RPT-'. date('y-m-d', strtotime($request->date)) . '-']);
        $userId = Auth::user()->id;

        Report::create([
            'projectId' => $project->projectId,
            'date' => $request->date,
            'userId' => $userId,
        ]);

        return redirect(route('projectDetail.index', ['project' => $project->projectId], absolute: false))->with('success', 'Data successfully added');

    }

    public function reporterAdd(Project $project) {
        $user = User::latest()->get();

        return view('projectDetails.reporterAdd', [
            'project' => $project,
            'users' => $user
        ]);
    }

    public function reporterSave(Request $request, Project $project) {
        // dd($request);
        $request->validate([
            'userId' => ['required']
        ]);

        // $reportId = IdGenerator::generate(['table' => 'reports', 'field' => 'reportId', 'length' => 20, 'prefix' => 'RPT-'. date('y-m-d', strtotime($request->date)) . '-']);
        // $userId = Auth::user()->id;

        Reporter::create([
            'projectId' => $project->projectId,
            'userId' => $request->userId,
        ]);

        return redirect(route('projectDetail.index', ['project' => $project->projectId], absolute: false))->with('success', 'Data successfully added');

    }

    public function reporterDestroy(Reporter $reporter) {

        try{
            Reporter::where('reporterId', $reporter->reporterId)->delete();
        } catch (\Illuminate\Database\QueryException){
            return back()->with([
                'error' => 'Data cannot be deleted, because the data is still needed!',
            ]);
        }

        return back()->with('success', 'Data deleted successfully');
    }

}
