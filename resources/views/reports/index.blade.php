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
                    <p class="font-bold">Project Address</p>
                    <p class="mb-3"> {{ $report->project->projectAddress }}</p>
                    <p class="font-bold">Customer</p>
                    <p class="mb-3"> {{ $report->project->customer }}</p>
                    <p class="font-bold">Address</p>
                    <p class="mb-3"> {{ $report->project->address }}</p>
                    <p class="font-bold">Description</p>
                    <p class="mb-3"> {{ $report->project->projectDesc }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
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
                {{-- @foreach ($reports as $report)
                <div class="text-gray-900 mt-3">
                    <div class="grid grid-cols-2 gap-4 text-gray-900">
                        <div>
                            <p>Report {{ $report->date }}</p>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('report.index', ['report' => $report->reportId]) }}" class="btn btn-success btn-sm text-white">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach --}}

            </div>
        </div>
    </div>
</x-app-layout>
