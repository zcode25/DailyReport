<?php

namespace App\Http\Controllers;

use App\Models\Ppe;
use App\Models\Note;
use App\Models\User;
use App\Models\Remark;
use App\Models\Report;
use App\Models\Biology;
use App\Models\Physics;
use App\Models\Weather;
use App\Models\Activity;
use App\Models\Behavior;
use App\Models\Chemical;
use App\Models\Ergonomy;
use App\Models\Manpower;
// use Barryvdh\DomPDF\PDF as DomPDF;
use App\Models\Question;
use App\Models\Condition;
use App\Models\Equipment;
use App\Models\Psikology;
use App\Models\ActivityPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as DomPDF;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ReportController extends Controller
{
    public function index(Report $report) {

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $manpowers = [
            ["type" => "Project Manager"],
            ["type" => "Site Manager"],
            ["type" => "Supervisor"],
            ["type" => "Surveyor"],
            ["type" => "Safety"],
            ["type" => "Civil"],
            ["type" => "Mechanical"],
            ["type" => "Operator"],
        ];

        $ppes = [
            ["type" => "Helm"],
            ["type" => "Uniform"],
            ["type" => "Vest"],
            ["type" => "Safety Shoes"],
            ["type" => "Safety Goggles"],
            ["type" => "Glove"],
            ["type" => "Safety Mask"],
            ["type" => "Ear Plug"],
        ];

        $equipments = [
            ["type" => "Exca"],
            ["type" => "Buldozer"],
            ["type" => "Vibro"],
            ["type" => "Truck"],
            ["type" => "Pick up"],
            ["type" => "Crane"],
            ["type" => "Forklift"],
            ["type" => "Pancang"],
        ];

        $weathers = [
            ["type" => "8:00 - 9:00"],
            ["type" => "9:00 - 10:00"],
            ["type" => "10:00 - 11:00"],
            ["type" => "11:00 - 12:00"],
            ["type" => "13:00 - 14:00"],
            ["type" => "14:00 - 15:00"],
            ["type" => "15:00 - 16:00"],
            ["type" => "16:00 - 17:00"],
            ["type" => "17:00 - 18:00"],
            ["type" => "19:00 - 20:00"],
            ["type" => "20:00 - 21:00"],
            ["type" => "21:00 - 22:00"],
        ];

        $chemicals = [
            ["type" => "Debu"],
            ["type" => "Cairan"],
            ["type" => "Gas"],
        ];

        $physics = [
            ["type" => "Iklim Kerja"],
            ["type" => "Kebisingan"],
            ["type" => "Getaran"],
            ["type" => "Gelombang"],
            ["type" => "Tekanan Udara"],
            ["type" => "Pencahayaan"],
        ];

        $biologys = [
            ["type" => "Mikroorganisme"],
            ["type" => "Arthopoda"],
            ["type" => "Hewan Invertebrata"],
            ["type" => "Alergi"],
            ["type" => "Binatang berbisa"],
            ["type" => "Binatang buas"],
        ];

        $psikologys = [
            ["type" => "Gangguan internal"],
            ["type" => "Gangguan external"],
            ["type" => "Lingkungan kerja"],
        ];


        $ergonomys = [
            ["type" => "Cara kerja"],
            ["type" => "Posisi kerja"],
            ["type" => "Alat kerja"],
            ["type" => "Beban angkat"],
        ];

        $behaviors = [
            ["type" => "Unsafe condition"],
            ["type" => "Unsafe action"],
            ["type" => "Safety violation"],
        ];

        $conditions = [
            ["type" => "Safe"],
            ["type" => "Minor injury"],
            ["type" => "Major injury"],
            ["type" => "Near miss"],
            ["type" => "Fatality"],
        ];

        $questions = [
            ["type" => "Apakah pekerja telah menggunakan Alat pelindung diri (APD)"],
            ["type" => "Apakah pekerja memahami resiko bahaya dari pekerjaannya"],
            ["type" => "Apakah dilokasi kerja tersedia Alat pemadam api ringan (APAR)"],
            ["type" => "Apakah tanda peringatan dan batas area kerja sudah terpasang"],
            ["type" => "Apakah peralatan tangga dan perancah dalam kondisi aman"],
            ["type" => "Apakah pekerja sudah menggunakan dan memproteksi terjatuh"],
            ["type" => "Apakah Peralatan kerja sudah dirapihkan"],
            ["type" => "Apakah lingkungan kerja sudah dibersihkan"],
        ];

        $manpowerData = Manpower::where('reportId', $report->reportId)->get()->keyBy('position');
        $ppeData = Ppe::where('reportId', $report->reportId)->get()->keyBy('ppeName');
        $equipmentData = Equipment::where('reportId', $report->reportId)->get()->keyBy('equipmentName');
        $weatherData = Weather::where('reportId', $report->reportId)->get()->keyBy('time');
        $chemicalData = Chemical::where('reportId', $report->reportId)->get()->keyBy('chemicalName');
        $physicData = Physics::where('reportId', $report->reportId)->get()->keyBy('physicName');
        $biologyData = Biology::where('reportId', $report->reportId)->get()->keyBy('biologyName');
        $psikologyData = Psikology::where('reportId', $report->reportId)->get()->keyBy('psikologyName');
        $ergonomyData = Ergonomy::where('reportId', $report->reportId)->get()->keyBy('ergonomyName');
        $behaviorData = Behavior::where('reportId', $report->reportId)->get()->keyBy('behaviorName');
        $conditionData = Condition::where('reportId', $report->reportId)->get()->keyBy('conditionName');
        $questionData = question::where('reportId', $report->reportId)->get()->keyBy('questionName');
        $noteData = Note::where('reportId', $report->reportId)->first();
        $remarkData = Remark::where('reportId', $report->reportId)->first();
        $activitys = Activity::where('reportId', $report->reportId)->get();
        $activityPlans = ActivityPlan::where('reportId', $report->reportId)->get();

        // dd($noteData);

        return view('reports.index', [
            'report' => $report,
            'manpowers' => $manpowers,
            'manpowerData' => $manpowerData,
            'ppes' => $ppes,
            'ppeData' => $ppeData,
            'equipments' => $equipments,
            'equipmentData' => $equipmentData,
            'weathers' => $weathers,
            'weatherData' => $weatherData,
            'chemicals' => $chemicals,
            'chemicalData' => $chemicalData,
            'physics' => $physics,
            'physicData' => $physicData,
            'biologys' => $biologys,
            'biologyData' => $biologyData,
            'psikologys' => $psikologys,
            'psikologyData' => $psikologyData,
            'ergonomys' => $ergonomys,
            'ergonomyData' => $ergonomyData,
            'behaviors' => $behaviors,
            'behaviorData' => $behaviorData,
            'conditions' => $conditions,
            'conditionData' => $conditionData,
            'questions' => $questions,
            'questionData' => $questionData,
            'noteData' => $noteData,
            'remarkData' => $remarkData,
            'activitys' => $activitys,
            'activityPlans' => $activityPlans,
        ]);
    }

    public function manpowerSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);


        foreach ($validatedData['data'] as $position => $qty) {
            $manpower = Manpower::where([
                ['reportId', $report->reportId],
                ['position', $position]
            ])->first();


            if ($manpower) {
                $manpower->update([
                    'person' => $qty,
                ]);
            } else {
                // $manpowerId = IdGenerator::generate(['table' => 'manpowers', 'field' => 'manpowerId', 'length' => 10, 'prefix' => 'MPW']);

                Manpower::create([
                    'reportId' => $report->reportId,
                    'position' => $position,
                    'person' => $qty,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function ppeSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $ppeName => $result) {
            $ppe = Ppe::where([
                ['reportId', $report->reportId],
                ['ppeName', $ppeName]
            ])->first();


            if ($ppe) {
                $ppe->update([
                    'result' => $result,
                ]);
            } else {

                Ppe::create([
                    'reportId' => $report->reportId,
                    'ppeName' => $ppeName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function equipmentSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $equipmentName => $result) {
            $equipment = Equipment::where([
                ['reportId', $report->reportId],
                ['equipmentName', $equipmentName]
            ])->first();


            if ($equipment) {
                $equipment->update([
                    'result' => $result,
                ]);
            } else {

                Equipment::create([
                    'reportId' => $report->reportId,
                    'equipmentName' => $equipmentName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function weatherSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'array',
            'data.*' => 'integer|min:0',
        ]);

        foreach ($validatedData['data'] as $time => $result) {
            $weather = Weather::where([
                ['reportId', $report->reportId],
                ['time', $time]
            ])->first();


            if ($weather) {
                $weather->update([
                    'result' => $result,
                ]);
            } else {

                Weather::create([
                    'reportId' => $report->reportId,
                    'time' => $time,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function chemicalSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $chemicalName => $result) {
            $chemical = Chemical::where([
                ['reportId', $report->reportId],
                ['chemicalName', $chemicalName]
            ])->first();


            if ($chemical) {
                $chemical->update([
                    'result' => $result,
                ]);
            } else {

                Chemical::create([
                    'reportId' => $report->reportId,
                    'chemicalName' => $chemicalName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function physicsSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $physicName => $result) {
            $physics = Physics::where([
                ['reportId', $report->reportId],
                ['physicName', $physicName]
            ])->first();


            if ($physics) {
                $physics->update([
                    'result' => $result,
                ]);
            } else {

                Physics::create([
                    'reportId' => $report->reportId,
                    'physicName' => $physicName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function biologySave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $biologyName => $result) {
            $biology = Biology::where([
                ['reportId', $report->reportId],
                ['biologyName', $biologyName]
            ])->first();


            if ($biology) {
                $biology->update([
                    'result' => $result,
                ]);
            } else {

                Biology::create([
                    'reportId' => $report->reportId,
                    'biologyName' => $biologyName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }


    public function psikologySave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $psikologyName => $result) {
            $psikology = Psikology::where([
                ['reportId', $report->reportId],
                ['psikologyName', $psikologyName]
            ])->first();


            if ($psikology) {
                $psikology->update([
                    'result' => $result,
                ]);
            } else {

                Psikology::create([
                    'reportId' => $report->reportId,
                    'psikologyName' => $psikologyName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function ergonomySave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $ergonomyName => $result) {
            $ergonomy = Ergonomy::where([
                ['reportId', $report->reportId],
                ['ergonomyName', $ergonomyName]
            ])->first();


            if ($ergonomy) {
                $ergonomy->update([
                    'result' => $result,
                ]);
            } else {

                Ergonomy::create([
                    'reportId' => $report->reportId,
                    'ergonomyName' => $ergonomyName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function behaviorSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $behaviorName => $result) {
            $behavior = Behavior::where([
                ['reportId', $report->reportId],
                ['behaviorName', $behaviorName]
            ])->first();


            if ($behavior) {
                $behavior->update([
                    'result' => $result,
                ]);
            } else {

                Behavior::create([
                    'reportId' => $report->reportId,
                    'behaviorName' => $behaviorName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function conditionSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $conditionName => $result) {
            $condition = Condition::where([
                ['reportId', $report->reportId],
                ['conditionName', $conditionName]
            ])->first();


            if ($condition) {
                $condition->update([
                    'result' => $result,
                ]);
            } else {

                Condition::create([
                    'reportId' => $report->reportId,
                    'conditionName' => $conditionName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function questionSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*' => 'required|integer|min:0',
        ]);

        foreach ($validatedData['data'] as $questionName => $result) {
            $question = Question::where([
                ['reportId', $report->reportId],
                ['questionName', $questionName]
            ])->first();


            if ($question) {
                $question->update([
                    'result' => $result,
                ]);
            } else {

                Question::create([
                    'reportId' => $report->reportId,
                    'questionName' => $questionName,
                    'result' => $result,
                ]);
            }
        }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }


    public function noteSave(Request $request, Report $report) {
        $request->validate([
            'note' => ['required', 'string', 'max:500'],
        ]);

        $note = Note::where([
                ['reportId', $report->reportId],
            ])->first();

            if ($note) {
                $note->update([
                    'note' => $request->note,
                ]);
            } else {

                note::create([
                    'reportId' => $report->reportId,
                    'note' => $request->note,
                ]);
            }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function remarkSave(Request $request, Report $report) {
        $request->validate([
            'remark' => ['required', 'string', 'max:255'],
        ]);

        $remark = Remark::where([
                ['reportId', $report->reportId],
            ])->first();

            if ($remark) {
                $remark->update([
                    'remark' => $request->remark,
                ]);
            } else {

                Remark::create([
                    'reportId' => $report->reportId,
                    'remark' => $request->remark,
                ]);
            }

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function activityAdd(Report $report) {
        return view('reports.activity', [
            'report' => $report
        ]);
    }

    public function activitySave(Request $request, Report $report) {


        $validatedData = $request->validate([
            'activityTime' => 'required',
            'activityName' => 'required',
            'activityImage' => 'required',
        ]);

        if($request->file('activityImage')) {
            $validatedData['activityImage'] = $request->file('activityImage')->store('activityImage');
        }

        $validatedData['reportId'] = $report->reportId;

        Activity::create($validatedData);

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function activityPlanAdd(Report $report) {
        return view('reports.activityPlan', [
            'report' => $report
        ]);
    }

    public function activityPlanSave(Request $request, Report $report) {

        $validatedData = $request->validate([
            'activityPlanName' => 'required',
        ]);

        $validatedData['reportId'] = $report->reportId;

        ActivityPlan::create($validatedData);

        return redirect(route('report.index', ['report' => $report->reportId], absolute: false))->with('success', 'Data successfully updated');
    }

    public function activityDestroy(Activity $activity) {

        $activityImage = Activity::where('activityId', $activity->activityId)->first();

        try{
            Storage::delete($activityImage->activityImage);
            Activity::where('activityId', $activity->activityId)->delete();
        } catch (\Illuminate\Database\QueryException){
            return back()->with([
                'error' => 'Data cannot be deleted, because the data is still needed!',
            ]);
        }

        return redirect(route('report.index', ['report' => $activityImage->reportId], absolute: false))->with('success', 'Data successfully deleted');
    }

    public function activityPlanDestroy(ActivityPlan $activityPlan) {

        try{
            ActivityPlan::where('activityPlanId', $activityPlan->activityPlanId)->delete();
        } catch (\Illuminate\Database\QueryException){
            return back()->with([
                'error' => 'Data cannot be deleted, because the data is still needed!',
            ]);
        }

        return redirect(route('report.index', ['report' => $activityPlan->reportId], absolute: false))->with('success', 'Data successfully deleted');
    }

    public function export(Report $report) {

        $manpowers = Manpower::where('reportId', $report->reportId)->get();
        $ppes = Ppe::where('reportId', $report->reportId)->get();
        $equipments = Equipment::where('reportId', $report->reportId)->get();
        $weathers = Weather::where('reportId', $report->reportId)->get();
        $activitys = Activity::where('reportId', $report->reportId)->get();
        $activityPlans = ActivityPlan::where('reportId', $report->reportId)->get();
        $chemicals = Chemical::where('reportId', $report->reportId)->get();
        $physics = Physics::where('reportId', $report->reportId)->get();
        $biologys = Biology::where('reportId', $report->reportId)->get();
        $psikologys = Psikology::where('reportId', $report->reportId)->get();
        $ergonomys = Ergonomy::where('reportId', $report->reportId)->get();
        $behaviors = Behavior::where('reportId', $report->reportId)->get();
        $conditions = condition::where('reportId', $report->reportId)->get();
        $questions = question::where('reportId', $report->reportId)->get();
        $notes = note::where('reportId', $report->reportId)->first();
        $remarks = remark::where('reportId', $report->reportId)->first();

        $manpowersArray = [];
        $ppesArray = [];
        $equipmentsArray = [];
        $weathersArray = [];
        $chemicalsArray = [];
        $physicsArray = [];
        $biologysArray = [];
        $psikologysArray = [];
        $ergonomysArray = [];
        $behaviorsArray = [];
        $conditionsArray = [];
        $questionsArray = [];


        foreach ($manpowers as $manpower) {
            $manpowersArray[$manpower->position] = [
                'person' => $manpower->person,
            ];
        }

        foreach ($ppes as $ppe) {
            $ppesArray[$ppe->ppeName] = [
                'result' => $ppe->result,
            ];
        }

        foreach ($equipments as $equipment) {
            $equipmentsArray[$equipment->equipmentName] = [
                'result' => $equipment->result,
            ];
        }

        foreach ($weathers as $weather) {
            $weathersArray[$weather->time] = [
                'result' => $weather->result,
            ];
        }

        foreach ($chemicals as $chemical) {
            $chemicalsArray[$chemical->chemicalName] = [
                'result' => $chemical->result,
            ];
        }

        foreach ($physics as $physic) {
            $physicsArray[$physic->physicName] = [
                'result' => $physic->result,
            ];
        }

        foreach ($biologys as $biology) {
            $biologysArray[$biology->biologyName] = [
                'result' => $biology->result,
            ];
        }

        foreach ($psikologys as $psikology) {
            $psikologysArray[$psikology->psikologyName] = [
                'result' => $psikology->result,
            ];
        }

        foreach ($ergonomys as $ergonomy) {
            $ergonomysArray[$ergonomy->ergonomyName] = [
                'result' => $ergonomy->result,
            ];
        }

        foreach ($behaviors as $behavior) {
            $behaviorsArray[$behavior->behaviorName] = [
                'result' => $behavior->result,
            ];
        }

        foreach ($conditions as $condition) {
            $conditionsArray[$condition->conditionName] = [
                'result' => $condition->result,
            ];
        }

        foreach ($questions as $question) {
            $questionsArray[$question->questionName] = [
                'result' => $question->result,
            ];
        }


        // dd($questionsArray);


        $data = [
            'report' => $report,
            'manpowersArray' => $manpowersArray,
            'ppesArray' => $ppesArray,
            'equipmentsArray' => $equipmentsArray,
            'weathersArray' => $weathersArray,
            'activitys' => $activitys,
            'activityPlans' => $activityPlans,
            'chemicalsArray' => $chemicalsArray,
            'physicsArray' => $physicsArray,
            'biologysArray' => $biologysArray,
            'psikologysArray' => $psikologysArray,
            'ergonomysArray' => $ergonomysArray,
            'behaviorsArray' => $behaviorsArray,
            'conditionsArray' => $conditionsArray,
            'questionsArray' => $questionsArray,
            'notes' => $notes,
            'remarks' => $remarks,
        ];

        $pdf = DomPDF::loadView('reports.export', $data);
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('Report-'. $report->date .'.pdf');
    }
}
