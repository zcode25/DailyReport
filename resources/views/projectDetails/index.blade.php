<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-3">{{ $project->projectName }}</h2>
                    <p class="font-bold">Customer</p>
                    <p class="mb-3"> {{ $project->customer }}</p>
                    <p class="font-bold">Address</p>
                    <p class="mb-3"> {{ $project->address }}</p>
                    <p class="font-bold">Period</p>
                    <p class="mb-3"> {{ $project->period }}</p>
                    <p class="font-bold">Description</p>
                    <p class="mb-3"> {{ $project->projectDesc }}</p>
                </div>
            </div>
            @if (Auth::user()->level == 0)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <div class="flex flex-row content-center text-gray-900">
                    <div class="basis-1/2">
                        <p class="text-xl font-bold">Reporter</p>
                    </div>
                    <div class="basis-1/2">
                        <div class="text-end">
                            <a href="{{ route('projectDetail.reporter.add', ['project' => $project->projectId]) }}" class="btn btn-primary btn-sm text-white">Add</a>
                        </div>
                    </div>
                </div>
                @foreach ($reporters as $reporter)
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-2 text-gray-900">
                        <div>
                            <p>{{ $reporter->user->name }}</p>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('projectDetail.reporter.destroy', ['reporter' => $reporter->reporterId]) }}" class="btn btn-secondary btn-sm text-white" data-confirm-delete="true">Delete</a>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-3">
                <div class="flex flex-row content-center text-gray-900">
                    <div class="basis-1/2">
                        <p class="text-xl font-bold">Daily Reports</p>
                    </div>
                    <div class="basis-1/2">
                        <div class="text-end">
                            <a href="{{ route('projectDetail.add', ['project' => $project->projectId]) }}" class="btn btn-primary btn-sm text-white">Add</a>
                        </div>
                    </div>
                </div>
                @foreach ($reports as $report)
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-2 text-gray-900">
                        <div>
                            <p>{{ \Carbon\Carbon::parse($report->date)->format('d F Y') }}</p>
                            <p class="text-sm mt-1">{{ $report->user->name}}</p>
                        </div>
                        <div class="text-end">
                            {{-- @if (Auth::user()->level == 0 || Auth::user()->id == $report->userId) --}}
                            <a href="{{ route('report.index', ['report' => $report->reportId]) }}" class="btn btn-success btn-sm text-white">Detail</a>
                            {{-- @endif --}}
                        </div>
                    </div>

                </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>
