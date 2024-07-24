<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Report') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="post" action="{{ route('report.manpower.save', ['report' => $report->reportId]) }}">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Manpower Form</h2>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="projectManager">Project Manager</label>
                      <input class="input input-bordered w-full bg-white @error('projectManager') input-error @enderror" type="text" id="projectManager" name="projectManager" value="{{ old('projectManager') }}">
                      @error('projectManager')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="siteManager">Site Manager</label>
                        <input class="input input-bordered w-full bg-white @error('siteManager') input-error @enderror" type="text" id="siteManager" name="siteManager" value="{{ old('siteManager') }}">
                        @error('siteManager')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="supervisor">Supervisor</label>
                        <input class="input input-bordered w-full bg-white @error('supervisor') input-error @enderror" type="text" id="supervisor" name="supervisor" value="{{ old('supervisor') }}">
                        @error('supervisor')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="surveyor">Surveyor</label>
                        <input class="input input-bordered w-full bg-white @error('surveyor') input-error @enderror" type="text" id="surveyor" name="surveyor" value="{{ old('surveyor') }}">
                        @error('surveyor')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="safety">Safety</label>
                        <input class="input input-bordered w-full bg-white @error('safety') input-error @enderror" type="text" id="safety" name="safety" value="{{ old('safety') }}">
                        @error('safety')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="civil">Civil</label>
                        <input class="input input-bordered w-full bg-white @error('civil') input-error @enderror" type="text" id="civil" name="civil" value="{{ old('civil') }}">
                        @error('civil')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="mechanical">Mechanical</label>
                        <input class="input input-bordered w-full bg-white @error('mechanical') input-error @enderror" type="text" id="mechanical" name="mechanical" value="{{ old('mechanical') }}">
                        @error('mechanical')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="operator">Operator</label>
                        <input class="input input-bordered w-full bg-white @error('operator') input-error @enderror" type="text" id="operator" name="operator" value="{{ old('operator') }}">
                        @error('operator')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
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
