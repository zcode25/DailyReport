<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Report $report) {
        return view('reports.index', [
            'report' => $report
        ]);
    }

    public function manpower(Report $report) {
        return view('reports.mainpower', [
            'report' => $report
        ]);
    }
}
