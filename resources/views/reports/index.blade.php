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
                <div class="flex flex-row content-center text-gray-900">
                    <div class="basis-1/2">
                        <p class="text-xl font-bold">Mainpower</p>
                    </div>
                    <div class="basis-1/2">
                        <div class="text-end">
                            <a href="{{ route('report.manpower', ['report' => $report->reportId]) }}" class="btn btn-primary btn-sm text-white">Add</a>
                        </div>
                    </div>
                </div>
                @foreach ($manpowers as $manpower)
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Project Manager</p>
                        </div>
                        <div>
                            <p>{{ $manpower->projectManager}}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Site Manager</p>
                        </div>
                        <div>
                            <p>{{ $manpower->siteManager}}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Supervisor</p>
                        </div>
                        <div>
                            <p>{{ $manpower->supervisor}}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Surveyor</p>
                        </div>
                        <div>
                            <p>{{ $manpower->surveyor }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Safety</p>
                        </div>
                        <div>
                            <p>{{ $manpower->safety }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Civil</p>
                        </div>
                        <div>
                            <p>{{ $manpower->civil }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Mechanical</p>
                        </div>
                        <div>
                            <p>{{ $manpower->mechanical }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Operator</p>
                        </div>
                        <div>
                            <p>{{ $manpower->operator }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex flex-row content-center text-gray-900">
                    <div class="basis-1/2">
                        <p class="text-xl font-bold">PPE</p>
                    </div>
                    <div class="basis-1/2">
                        <div class="text-end">
                            <a href="{{ route('report.ppe', ['report' => $report->reportId]) }}" class="btn btn-primary btn-sm text-white">Add</a>
                        </div>
                    </div>
                </div>
                @foreach ($manpowers as $manpower)
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Project Manager</p>
                        </div>
                        <div>
                            <p>{{ $manpower->projectManager}}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Site Manager</p>
                        </div>
                        <div>
                            <p>{{ $manpower->siteManager}}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Supervisor</p>
                        </div>
                        <div>
                            <p>{{ $manpower->supervisor}}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Surveyor</p>
                        </div>
                        <div>
                            <p>{{ $manpower->surveyor }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Safety</p>
                        </div>
                        <div>
                            <p>{{ $manpower->safety }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Civil</p>
                        </div>
                        <div>
                            <p>{{ $manpower->civil }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Mechanical</p>
                        </div>
                        <div>
                            <p>{{ $manpower->mechanical }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Operator</p>
                        </div>
                        <div>
                            <p>{{ $manpower->operator }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
