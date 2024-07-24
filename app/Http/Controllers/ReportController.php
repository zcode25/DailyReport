<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Manpower;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ReportController extends Controller
{
    public function index(Report $report) {

        $manpowers = Manpower::latest()->get();

        return view('reports.index', [
            'report' => $report,
            'manpowers' => $manpowers
        ]);
    }

    public function manpower(Report $report) {
        return view('reports.manpower', [
            'report' => $report
        ]);
    }

    public function manpowerSave(Request $request, Report $report) {
        $request->validate([
            'projectManager' => ['required', 'string', 'max:255'],
            'siteManager' => ['required', 'string', 'max:255'],
            'supervisor' => ['required', 'string', 'max:255'],
            'surveyor' => ['required', 'string', 'max:255'],
            'safety' => ['required', 'string', 'max:255'],
            'civil' => ['required', 'string', 'max:255'],
            'mechanical' => ['required', 'string', 'max:255'],
            'operator' => ['required', 'string', 'max:255'],
        ]);

        $manpowerId = IdGenerator::generate(['table' => 'manpowers', 'field' => 'manpowerId', 'length' => 10, 'prefix' => 'MPW']);

        Manpower::create([
            'manpowerId' => $manpowerId,
            'reportId' => $report->reportId,
            'projectManager' => $request->projectManager,
            'siteManager' => $request->siteManager,
            'supervisor' => $request->supervisor,
            'surveyor' => $request->surveyor,
            'safety' => $request->safety,
            'civil' => $request->civil,
            'mechanical' => $request->mechanical,
            'operator' => $request->operator
        ]);


        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }
}
