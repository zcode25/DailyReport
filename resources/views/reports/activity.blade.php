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
                  <form method="post" action="{{ route('report.activity.save', ['report' => $report->reportId]) }}" enctype="multipart/form-data" >
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Activity List</h2>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="activityTime">Time</label>
                      <input class="input input-bordered w-full bg-white @error('activityTime') input-error @enderror" type="datetime-local" id="activityTime" name="activityTime" value="{{ old('activityTime') }}">
                      @error('activityTime')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="activityName">Activity</label>
                        <input class="input input-bordered w-full bg-white @error('activityName') input-error @enderror" type="text" id="activityName" name="activityName" value="{{ old('activityName') }}">
                        @error('activityName')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="activityImage">Image</label>
                        <input class="file-input file-input-bordered w-full bg-white @error('activityImage') input-error @enderror" type="file" id="activityImage" name="activityImage" value="{{ old('activityImage') }}">
                        @error('activityImage')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-row content-center">
                      <div class="basis-1/2">
                          <a href="{{ route('report.index', ['report' => $report->reportId]) }}" class="btn btn-ghost">Back</a>
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
