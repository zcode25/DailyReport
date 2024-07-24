<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Project') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="post" action="{{ route('project.save') }}">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Add Project Form</h2>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="projectName">Project Name</label>
                      <input class="input input-bordered w-full bg-white @error('projectName') input-error @enderror" type="text" id="projectName" name="projectName" value="{{ old('projectName') }}">
                      @error('projectName')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="customer">Customer</label>
                      <input class="input input-bordered w-full bg-white @error('projectAddress') input-error @enderror" type="text" id="customer" name="customer" value="{{ old('customer') }}">
                      @error('customer')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="address">Address</label>
                      <input class="input input-bordered w-full bg-white @error('projectAddress') input-error @enderror" type="text" id="address" name="address" value="{{ old('address') }}">
                      @error('address')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="period">Period</label>
                        <input class="input input-bordered w-full bg-white @error('projectperiod') input-error @enderror" type="text" id="period" name="period" value="{{ old('period') }}">
                        @error('period')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="projectDesc">Project Description</label>
                      <textarea class="textarea textarea-bordered w-full bg-white @error('projectDesc') input-error @enderror" id="projectDesc" name="projectDesc" rows="4">{{ old('projectDesc') }}</textarea>
                      @error('projectDesc')
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
