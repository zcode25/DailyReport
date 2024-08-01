<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Project Daily Report') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="post" action="{{ route('projectDetail.reporter.save', ['project' => $project->projectId]) }}">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Reporter Form</h2>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="date">User</label>
                      <select class="select select-bordered w-full" id="userId" name="userId">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="flex flex-row content-center">
                      <div class="basis-1/2">
                          <a href="{{ route('project.index') }}" class="btn btn-ghost">Back</a>
                      </div>
                      <div class="basis-1/2 text-end">
                          <button class="btn btn-primary text-white">Submit</button>
                      </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
