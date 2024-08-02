<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Daily Reports') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="post" action="{{ route('projectDetail.save', ['project' => $project->projectId]) }}">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Daily Report Form</h2>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="date">Date</label>
                      <input class="input input-bordered w-full bg-white @error('date') input-error @enderror" type="date" id="date" name="date" value="{{ old('date') }}">
                      @error('date')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="flex flex-row content-center">
                      <div class="basis-1/2">
                          <a href="{{ route('projectDetail.index', ['project' => $project->projectId]) }}" class="btn btn-ghost">Back</a>
                      </div>
                      <div class="basis-1/2 text-end">
                          <button class="btn btn-neutral text-white">Submit</button>
                      </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
