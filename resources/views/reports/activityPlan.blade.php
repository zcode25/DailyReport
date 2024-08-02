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
                  <form method="post" action="{{ route('report.activityPlan.save', ['report' => $report->reportId]) }}" enctype="multipart/form-data" >
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Activity Planning List</h2>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="activityPlanName">Activity Planning</label>
                        <input class="input input-bordered w-full bg-white @error('activityPlanName') input-error @enderror" type="text" id="activityPlanName" name="activityPlanName" value="{{ old('activityPlanName') }}">
                        @error('activityPlanName')
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
