<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-3">{{ $report->project->projectName }}</h2>
                    <p class="font-bold">Customer</p>
                    <p class="mb-3"> {{ $report->project->customer }}</p>
                    <p class="font-bold">Address</p>
                    <p class="mb-3"> {{ $report->project->address }}</p>
                    <p class="font-bold">Period</p>
                    <p class="mb-3"> {{ $report->project->period }}</p>
                    <p class="font-bold">Description</p>
                    <p class="mb-3"> {{ $report->project->projectDesc }}</p>
                    <a target="_blank" href="{{ route('report.export', ['report' => $report->reportId]) }}" class="btn btn-neutral text-white">Export PDF</a>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.manpower.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Mainpower</p>
                </div>
                @foreach ($manpowers as $manpower)
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>{{ $manpower['type'] }}</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('data.' . $manpower['type']) input-error @enderror" type="number" id="{{ $manpower['type'] }}" name="data[{{ $manpower['type'] }}]" value="{{ old('data.' . $manpower['type'], $manpowerData[$manpower['type']]->person ?? '') }}">
                        @error('data.' . $manpower['type'])
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endforeach
                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.ppe.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">PPE</p>
                </div>

                @foreach ($ppes as $ppe)
                <div class="text-gray-900">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">{{ $ppe['type'] }}</span>
                            <input type="hidden" name="data[{{ $ppe['type'] }}]" value="0">
                            <input type="checkbox" class="checkbox checkbox-neutral" id="{{ $ppe['type'] }}" name="data[{{ $ppe['type'] }}]" value="1" {{ old('data.' . $ppe['type'], $ppeData[$ppe['type']]->result ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
                @endforeach

                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.equipment.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Equipment</p>
                </div>
                @foreach ($equipments as $equipment)
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>{{ $equipment['type'] }}</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('data.' . $equipment['type']) input-error @enderror" type="number" id="{{ $equipment['type'] }}" name="data[{{ $equipment['type'] }}]" value="{{ old('data.' . $equipment['type'], $equipmentData[$equipment['type']]->result?? '') }}">
                        @error('data.' . $equipment['type'])
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endforeach

                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.weather.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Weather</p>
                </div>
                @foreach ($weathers as $weather)
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">{{ $weather['type'] }}</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-neutral" id="{{ $weather['type'] }}-0" name="data[{{ $weather['type'] }}]" value="0" @if ((string)($weatherData[$weather['type']]->result ?? '') === '0') checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-neutral" id="{{ $weather['type'] }}-1" name="data[{{ $weather['type'] }}]" value="1" @if ((string)($weatherData[$weather['type']]->result ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.remark.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Remarks</p>
                </div>
                {{-- @foreach ($equipments as $equipment) --}}
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Remarks</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('remark') input-error @enderror" type="text" id="remark" name="remark" value="{{ old('remark', $remarkData->remark ?? '') }}">
                        @error('remark')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- @endforeach --}}

                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.chemical.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Kimia</p>
                </div>
                @foreach ($chemicals as $chemical)
                <div class="text-gray-900">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">{{ $chemical['type'] }}</span>
                            <input type="hidden" name="data[{{ $chemical['type'] }}]" value="0">
                            <input type="checkbox" class="checkbox checkbox-neutral" id="{{ $chemical['type'] }}" name="data[{{ $chemical['type'] }}]" value="1" {{ old('data.' . $chemical['type'], $chemicalData[$chemical['type']]->result ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
                @endforeach

                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.physics.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Fisika</p>
                </div>
                @foreach ($physics as $physic)
                <div class="text-gray-900">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">{{ $physic['type'] }}</span>
                            <input type="hidden" name="data[{{ $physic['type'] }}]" value="0">
                            <input type="checkbox" class="checkbox checkbox-neutral" id="{{ $physic['type'] }}" name="data[{{ $physic['type'] }}]" value="1" {{ old('data.' . $physic['type'], $physicData[$physic['type']]->result ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
                @endforeach
                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.biology.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Biologi</p>
                </div>
                @foreach ($biologys as $biology)
                <div class="text-gray-900">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">{{ $biology['type'] }}</span>
                            <input type="hidden" name="data[{{ $biology['type'] }}]" value="0">
                            <input type="checkbox" class="checkbox checkbox-neutral" id="{{ $biology['type'] }}" name="data[{{ $biology['type'] }}]" value="1" {{ old('data.' . $biology['type'], $biologyData[$biology['type']]->result ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
                @endforeach
                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.psikology.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Psikologi</p>
                </div>
                @foreach ($psikologys as $psikology)
                <div class="text-gray-900">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">{{ $psikology['type'] }}</span>
                            <input type="hidden" name="data[{{ $psikology['type'] }}]" value="0">
                            <input type="checkbox" class="checkbox checkbox-neutral" id="{{ $psikology['type'] }}" name="data[{{ $psikology['type'] }}]" value="1" {{ old('data.' . $psikology['type'], $psikologyData[$psikology['type']]->result ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
                @endforeach
                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.ergonomy.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Ergonomi</p>
                </div>
                @foreach ($ergonomys as $ergonomy)
                <div class="text-gray-900">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">{{ $ergonomy['type'] }}</span>
                            <input type="hidden" name="data[{{ $ergonomy['type'] }}]" value="0">
                            <input type="checkbox" class="checkbox checkbox-neutral" id="{{ $ergonomy['type'] }}" name="data[{{ $ergonomy['type'] }}]" value="1" {{ old('data.' . $ergonomy['type'], $ergonomyData[$ergonomy['type']]->result ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
                @endforeach
                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.behavior.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Behavior</p>
                </div>
                @foreach ($behaviors as $behavior)
                <div class="text-gray-900">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">{{ $behavior['type'] }}</span>
                            <input type="hidden" name="data[{{ $behavior['type'] }}]" value="0">
                            <input type="checkbox" class="checkbox checkbox-neutral" id="{{ $behavior['type'] }}" name="data[{{ $behavior['type'] }}]" value="1" {{ old('data.' . $behavior['type'], $behaviorData[$behavior['type']]->result ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
                @endforeach
                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.condition.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Condition</p>
                </div>
                @foreach ($conditions as $condition)
                <div class="text-gray-900">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">{{ $condition['type'] }}</span>
                            <input type="hidden" name="data[{{ $condition['type'] }}]" value="0">
                            <input type="checkbox" class="checkbox checkbox-neutral" id="{{ $condition['type'] }}" name="data[{{ $condition['type'] }}]" value="1" {{ old('data.' . $condition['type'], $conditionData[$condition['type']]->result ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
                @endforeach
                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.question.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Question</p>
                </div>
                @foreach ($questions as $question)
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">{{ $question['type'] }}</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Yes</span>
                                <input type="radio" class="radio radio-neutral" id="{{ $question['type'] }}-0" name="data[{{ $question['type'] }}]" value="0" @if ((string)($questionData[$question['type']]->result ?? '') === '0') checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700 text-center">No</span>
                                <input type="radio" class="radio radio-neutral" id="{{ $question['type'] }}-1" name="data[{{ $question['type'] }}]" value="1" @if ((string)($questionData[$question['type']]->result ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.note.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Note</p>
                </div>
                {{-- @foreach ($equipments as $equipment) --}}
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Note</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('note') input-error @enderror" type="text" id="note" name="note" value="{{ old('note', $noteData->note ?? '') }}">
                        @error('note')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- @endforeach --}}

                <div class="div">
                    <button class="w-full btn btn-neutral text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <div class="flex flex-row content-center text-gray-900">
                    <div class="basis-1/2">
                        <p class="text-xl font-bold">Activity List</p>
                    </div>
                    <div class="basis-1/2">
                        <div class="text-end">
                            <a href="{{ route('report.activity.add', ['report' => $report->reportId]) }}" class="btn btn-neutral btn-sm text-white">Add</a>
                        </div>
                    </div>
                </div>
                @foreach ($activitys as $activity)
                <div class="card card-compact bg-base-100 shadow-md mt-5">
                    <figure>
                        <img src="{{ asset('storage/' .  $activity->activityImage ) }}"alt="Image" />
                    </figure>
                    <div class="card-body">
                        <p class="text-sm">{{ \Carbon\Carbon::parse($activity->activityTime)->format('Y-m-d H:i') }}</p>
                        <p class="text-lg mb-3">{{ $activity->activityName }}</p>
                        <a href="{{ route('report.activity.destroy', ['activity' => $activity->activityId]) }}" class="btn btn-secondary btn-sm text-white" data-confirm-delete="true">Delete</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">

                <div class="flex flex-row content-center text-gray-900">
                    <div class="basis-1/2">
                        <p class="text-xl font-bold">Activity Planning</p>
                    </div>
                    <div class="basis-1/2">
                        <div class="text-end">
                            <a href="{{ route('report.activityPlan.add', ['report' => $report->reportId]) }}" class="btn btn-neutral btn-sm text-white">Add</a>
                        </div>
                    </div>
                </div>
                @foreach ($activityPlans as $activityPlan)
                <div class="text-gray-900 mt-5">
                    <div class="grid grid-cols-2 gap-2 text-gray-900">
                        <div>
                            <p>{{ $activityPlan->activityPlanName }}</p>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('report.activityPlan.destroy', ['activityPlan' => $activityPlan->activityPlanId]) }}" class="btn btn-secondary btn-sm text-white" data-confirm-delete="true">Delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
