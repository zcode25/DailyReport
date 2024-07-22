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
                    <p class="font-bold">Project Address</p>
                    <p class="mb-3"> {{ $project->projectAddress }}</p>
                    <p class="font-bold">Customer</p>
                    <p class="mb-3"> {{ $project->customer }}</p>
                    <p class="font-bold">Address</p>
                    <p class="mb-3"> {{ $project->address }}</p>
                    <p class="font-bold">Description</p>
                    <p class="mb-3"> {{ $project->projectDesc }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row content-center p-6 text-gray-900">
                    <div class="basis-1/2">
                        <p class="text-xl font-bold mb-3">Daily Reports</p>
                    </div>
                    <div class="basis-1/2">
                        <div class="text-end">
                            <a href="{{ route('projectDetail.add', ['project' => $project->projectId]) }}" class="btn btn-primary btn-sm text-white">Add</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
