<?php

namespace App\Http\Controllers;

use App\Models\Ppe;
use App\Models\Report;
use App\Models\Weather;
use App\Models\Manpower;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ReportController extends Controller
{
    public function index(Report $report) {

        $manpower = Manpower::where('reportId', $report->reportId)->first();
        $ppe = Ppe::where('reportId', $report->reportId)->first();
        $equipment = Equipment::where('reportId', $report->reportId)->first();
        $weather = Weather::where('reportId', $report->reportId)->first();

        return view('reports.index', [
            'report' => $report,
            'manpower' => $manpower,
            'ppe' => $ppe,
            'equipment' => $equipment,
            'weather' => $weather
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

        Manpower::updateOrCreate(
            ['reportId' => $report->reportId],
            [
                'manpowerId' => $manpowerId,
                'projectManager' => $request->projectManager,
                'siteManager' => $request->siteManager,
                'supervisor' => $request->supervisor,
                'surveyor' => $request->surveyor,
                'safety' => $request->safety,
                'civil' => $request->civil,
                'mechanical' => $request->mechanical,
                'operator' => $request->operator
            ]
        );


        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function ppeSave(Request $request, Report $report) {
        $request->validate([
            'helm' => ['required'],
            'uniform' => ['required'],
            'vest' => ['required'],
            'safetyShoes' => ['required'],
            'safetyGoggles' => ['required'],
            'glove' => ['required'],
            'safetyMask' => ['required'],
            'earPlug' => ['required'],
        ]);

        $ppeId = IdGenerator::generate(['table' => 'ppes', 'field' => 'ppeId', 'length' => 10, 'prefix' => 'PPE']);

        Ppe::updateOrCreate(
            ['reportId' => $report->reportId,],
            [
                'ppeId' => $ppeId,
                'helm' => $request->helm,
                'uniform' => $request->uniform,
                'vest' => $request->vest,
                'safetyShoes' => $request->safetyShoes,
                'safetyGoggles' => $request->safetyGoggles,
                'glove' => $request->glove,
                'safetyMask' => $request->safetyMask,
                'earPlug' => $request->earPlug,
            ]
        );

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function equipmentSave(Request $request, Report $report) {
        $request->validate([
            'exca' => ['required'],
            'buldozer' => ['required'],
            'vibro' => ['required'],
            'truck' => ['required'],
            'pickup' => ['required'],
            'crane' => ['required'],
            'forklift' => ['required'],
            'pancang' => ['required'],
        ]);

        $equipmentId = IdGenerator::generate(['table' => 'equipment', 'field' => 'equipmentId', 'length' => 10, 'prefix' => 'EQP']);

        Equipment::updateOrCreate(
            ['reportId' => $report->reportId,],
            [
                'equipmentId' => $equipmentId,
                'exca' => $request->exca,
                'buldozer' => $request->buldozer,
                'vibro' => $request->vibro,
                'truck' => $request->truck,
                'pickup' => $request->pickup,
                'crane' => $request->crane,
                'forklift' => $request->forklift,
                'pancang' => $request->pancang,
            ]
        );

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function weatherSave(Request $request, Report $report) {

        // dd($request);

        // $request->validate([
        //     'time1' => ['required'],
        //     'time2' => ['required'],
        //     'time3' => ['required'],
        //     'time4' => ['required'],
        //     'time5' => ['required'],
        //     'time6' => ['required'],
        //     'time7' => ['required'],
        //     'time8' => ['required'],
        //     'time9' => ['required'],
        //     'time10' => ['required'],
        //     'time11' => ['required'],
        //     'time12' => ['required'],
        // ]);

        $weatherId = IdGenerator::generate(['table' => 'weather', 'field' => 'weatherId', 'length' => 10, 'prefix' => 'WAT']);

        Weather::updateOrCreate(
            ['reportId' => $report->reportId,],
            [
                'weatherId' => $weatherId,
                'time1' => $request->time1,
                'time2' => $request->time2,
                'time3' => $request->time3,
                'time4' => $request->time4,
                'time5' => $request->time5,
                'time6' => $request->time6,
                'time7' => $request->time7,
                'time8' => $request->time8,
                'time9' => $request->time9,
                'time10' => $request->time10,
                'time11' => $request->time11,
                'time12' => $request->time12,
            ]
        );

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    function chemicalSave(Request $request, Report $report) {
        $request->validate([
            'dust' => ['required'],
            'fluid' => ['required'],
            'gas' => ['required'],
        ]);

        $chemicalId = IdGenerator::generate(['table' => 'chemicals', 'field' => 'chemicalId', 'length' => 10, 'prefix' => 'CMH']);

        Ppe::updateOrCreate(
            ['reportId' => $report->reportId,],
            [
                'ppeId' => $ppeId,
                'dust' => $request->dust,
                'uniform' => $request->uniform,
                'vest' => $request->vest,
                'safetyShoes' => $request->safetyShoes,
                'safetyGoggles' => $request->safetyGoggles,
                'glove' => $request->glove,
                'safetyMask' => $request->safetyMask,
                'earPlug' => $request->earPlug,
            ]
        );

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }
}
