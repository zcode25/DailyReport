<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Project') }}
                </h2>
            </div>
            <div class="basis-1/2">
                <div class="text-end">
                    @if (Auth::user()->level == 0)
                        <a href="{{ route('project.add') }}" class="btn btn-neutral btn-sm text-white">Add</a>
                    @endif
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                @foreach ($projects as $project)
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
                            <div class="card-actions justify-end mt-5">
                                @if (Auth::user()->level == 0)
                                    <a href="{{ route('project.edit', ['project' => $project->projectId]) }}" class="btn btn-neutral text-white btn-sm">Update</a>
                                @endif

                                <a href="{{ route('projectDetail.index', ['project' => $project->projectId]) }}" class="btn btn-primary text-white btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
