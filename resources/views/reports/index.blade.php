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
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.manpower.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Mainpower</p>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Project Manager</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('projectManager') input-error @enderror" type="text" id="projectManager" name="projectManager" value="{{ old('projectManager', $manpower->projectManager ?? '') }}">
                        @error('projectManager')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Site Manager</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('siteManager') input-error @enderror" type="text" id="siteManager" name="siteManager" value="{{ old('siteManager', $manpower->siteManager ?? '') }}">
                        @error('siteManager')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Supervisor</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('supervisor') input-error @enderror" type="text" id="supervisor" name="supervisor" value="{{ old('supervisor', $manpower->supervisor ?? '') }}">
                        @error('supervisor')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Surveyor</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('surveyor') input-error @enderror" type="text" id="surveyor" name="surveyor" value="{{ old('surveyor', $manpower->surveyor ?? '') }}">
                        @error('surveyor')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Safety</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('safety') input-error @enderror" type="text" id="safety" name="safety" value="{{ old('safety', $manpower->safety ?? '') }}">
                        @error('safety')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Civil</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('civil') input-error @enderror" type="text" id="civil" name="civil" value="{{ old('civil',  $manpower->civil ?? '') }}">
                        @error('civil')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Mechanical</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('mechanical') input-error @enderror" type="text" id="mechanical" name="mechanical" value="{{ old('mechanical', $manpower->mechanical ?? '') }}">
                        @error('mechanical')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-5">
                    <div class="mb-3">
                        <p>Operator</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('operator') input-error @enderror" type="text" id="operator" name="operator" value="{{ old('operator', $manpower->operator ?? '') }}">
                        @error('operator')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="div">
                    <button class="w-full btn btn-primary text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.ppe.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900">
                    <p class="text-xl font-bold">PPE</p>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Helm</span>
                            <input type="hidden" name="helm" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('helm') input-error @enderror" id="helm" name="helm" value="1" {{ old('helm', $ppe->helm ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('helm')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Uniform</span>
                            <input type="hidden" name="uniform" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('uniform') input-error @enderror" id="uniform" name="uniform" value="1" {{ old('uniform', $ppe->uniform ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('uniform')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Vest</span>
                            <input type="hidden" name="vest" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('vest') input-error @enderror" id="vest" name="vest" value="1" {{ old('vest', $ppe->vest ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('vest')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Safety Shoes</span>
                            <input type="hidden" name="safetyShoes" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('safetyShoes') input-error @enderror" id="safetyShoes" name="safetyShoes" value="1" {{ old('safetyShoes', $ppe->safetyShoes ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('safetyShoes')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Safety Goggles</span>
                            <input type="hidden" name="safetyGoggles" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('safetyGoggles') input-error @enderror" id="safetyGoggles" name="safetyGoggles" value="1" {{ old('safetyGoggles', $ppe->safetyGoggles ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('safetyGoggles')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Glove</span>
                            <input type="hidden" name="glove" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('glove') input-error @enderror" id="glove" name="glove" value="1" {{ old('glove', $ppe->glove ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('glove')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Safety Mask</span>
                            <input type="hidden" name="safetyMask" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('safetyMask') input-error @enderror" id="safetyMask" name="safetyMask" value="1" {{ old('safetyMask', $ppe->safetyMask ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('safetyMask')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-5">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Ear Plug</span>
                            <input type="hidden" name="earPlug" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('earPlug') input-error @enderror" id="earPlug" name="earPlug" value="1" {{ old('earPlug', $ppe->earPlug ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('earPlug')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="div">
                        <button class="w-full btn btn-primary text-white">Save</button>
                    </div>

                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.equipment.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Equipment</p>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Exca</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('exca') input-error @enderror" type="number" id="exca" name="exca" value="{{ old('exca', $equipment->exca ?? '') }}">
                        @error('exca')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Buldozer</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('buldozer') input-error @enderror" type="number" id="buldozer" name="buldozer" value="{{ old('buldozer', $equipment->buldozer ?? '') }}">
                        @error('buldozer')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Vibro</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('vibro') input-error @enderror" type="number" id="vibro" name="vibro" value="{{ old('vibro', $equipment->vibro ?? '') }}">
                        @error('vibro')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Truck</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('truck') input-error @enderror" type="number" id="truck" name="truck" value="{{ old('truck', $equipment->truck ?? '') }}">
                        @error('truck')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Pick up</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('pickup') input-error @enderror" type="number" id="pickup" name="pickup" value="{{ old('pickup', $equipment->pickup ?? '') }}">
                        @error('pickup')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Crane</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('crane') input-error @enderror" type="number" id="crane" name="crane" value="{{ old('crane',  $equipment->crane ?? '') }}">
                        @error('crane')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-3">
                    <div class="mb-3">
                        <p>Forklift</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('forklift') input-error @enderror" type="number" id="forklift" name="forklift" value="{{ old('forklift', $equipment->forklift ?? '') }}">
                        @error('forklift')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-gray-900 mb-5">
                    <div class="mb-3">
                        <p>Pancang</p>
                    </div>
                    <div>
                        <input class="input input-bordered w-full bg-white @error('pancang') input-error @enderror" type="number" id="pancang" name="pancang" value="{{ old('pancang', $equipment->pancang ?? '') }}">
                        @error('pancang')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="div">
                    <button class="w-full btn btn-primary text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.weather.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900 mb-5">
                    <p class="text-xl font-bold">Weather</p>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">8:00 ~ 9:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time1-0" name="time1" value="0" @if ((string)($weather->time1 ?? '') === '0') checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time1-1" name="time1" value="1" @if ((string)($weather->time1 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">9:00 - 10:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time2-0" name="time2" value="0" @if ((string)($weather->time2 ?? '') === '0') checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time2-1" name="time2" value="1" @if ((string)($weather->time2 ?? '') === '1') checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">10:00 - 11:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time3-0" name="time3" value="0" @if ((string)($weather->time3 ?? '') === '0') checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time3-1" name="time3" value="1" @if ((string)($weather->time3 ?? '') === '1') checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">11:00 - 12:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time4-0" name="time4" value="0" @if ((string)($weather->time4 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time4-1" name="time4" value="1" @if ((string)($weather->time4 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">13:00 - 14:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time5-0" name="time5" value="0" @if ((string)($weather->time5 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time5-1" name="time5" value="1" @if ((string)($weather->time5 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">14:00 - 15:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time6-0" name="time6" value="0" @if ((string)($weather->time6 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time6-1" name="time6" value="1" @if ((string)($weather->time6 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">15:00 - 16:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time7-0" name="time7" value="0" @if ((string)($weather->time7 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time7-1" name="time7" value="1" @if ((string)($weather->time7 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">16:00 - 17:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time8-0" name="time8" value="0" @if ((string)($weather->time8 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time8-1" name="time8" value="1" @if ((string)($weather->time8 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">17:00 - 18:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time9-0" name="time9" value="0" @if ((string)($weather->time9 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time9-1" name="time9" value="1" @if ((string)($weather->time9 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">19:00 - 20:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time10-0" name="time10" value="0" @if ((string)($weather->time10 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time10-1" name="time10" value="1" @if ((string)($weather->time10 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">20:00 - 21:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time11-0" name="time11" value="0" @if ((string)($weather->time11 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time11-1" name="time11" value="1" @if ((string)($weather->time11 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 text-gray-700 mb-3">
                    <div class="label">21:00 - 22:00</div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-700">Bright</span>
                                <input type="radio" class="radio radio-primary" id="time12-0" name="time12" value="0" @if ((string)($weather->time12 ?? '') === '0' ) checked @endif>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="text-gray-700 text-center">Rain</span>
                                <input type="radio" class="radio radio-primary" id="time12-1" name="time12" value="1" @if ((string)($weather->time12 ?? '') === '1' ) checked @endif>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="div">
                    <button class="w-full btn btn-primary text-white">Save</button>
                </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <form method="post" action="{{ route('report.ppe.save', ['report' => $report->reportId]) }}">
                @csrf
                <div class="flex flex-row content-center text-gray-900">
                    <p class="text-xl font-bold">Kimia</p>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Debu</span>
                            <input type="hidden" name="dust" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('dust') input-error @enderror" id="dust" name="dust" value="1" {{ old('dust', $ppe->dust ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('dust')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Cairan</span>
                            <input type="hidden" name="fluid" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('fluid') input-error @enderror" id="fluid" name="fluid" value="1" {{ old('fluid', $ppe->fluid ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('fluid')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control mb-1">
                        <label class="label cursor-pointer">
                            <span class="label-text text-gray-700 text-lg">Gas</span>
                            <input type="hidden" name="gas" value="0">
                            <input type="checkbox" class="checkbox checkbox-primary @error('gas') input-error @enderror" id="gas" name="gas" value="1" {{ old('gas', $ppe->gas ?? '') == '1' ? 'checked' : '' }}>
                        </label>
                        @error('gas')
                            <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="div">
                        <button class="w-full btn btn-primary text-white">Save</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
