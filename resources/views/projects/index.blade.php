<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Project') }}
                </h2>
            </div>
            <div class="basis-1/2">
                <div class="div text-end">
                    <a href="{{ route('project.add') }}" class="btn btn-primary btn-sm text-white">Add</a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                @foreach ($projects as $project)
                    <div class="card bg-white text-black shadow mb-6">
                        <div class="card-body">
                        <h2 class="card-title">{{ $project->projectName }}</h2>
                        <p class="mb-3">{{ $project->customer }}</p>
                        <p>{{ $project->projectDesc }}</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary text-white btn-sm">Detail</button>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
