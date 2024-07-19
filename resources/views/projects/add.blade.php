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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="post" action="{{ route('project.save') }}">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Add Project Form</h2>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="projectName">Project Name</label>
                      <input class="w-full px-3 py-2 rounded focus:outline-none focus:border-indigo-500 @error('projectName') border-2 border-rose-500 @enderror" type="text" id="projectName" name="projectName" value="{{ old('projectName') }}">
                      @error('projectName')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="customer">Project Address</label>
                      <input class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-500 @error('projectAddress') border-2 border-rose-500 @enderror" type="text" id="projectAddress" name="projectAddress" value="{{ old('projectAddress') }}">
                      @error('projectAddress')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="customer">Customer</label>
                      <input class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-500 @error('projectAddress') border-2 border-rose-500 @enderror" type="text" id="customer" name="customer" value="{{ old('customer') }}">
                      @error('customer')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="projectDesc">Project Description</label>
                      <textarea class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-500 @error('projectDesc') border-2 border-rose-500 @enderror" id="projectDesc" name="projectDesc" rows="4">{{ old('projectDesc') }}</textarea>
                      @error('projectDesc')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div>
                        <button class="w-full bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 focus:outline-none focus:bg-indigo-700">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
