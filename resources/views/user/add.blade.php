<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('User') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="post" action="{{ route('user.save') }}">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Add User Form</h2>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="name">Name</label>
                      <input class="w-full px-3 py-2 rounded focus:outline-none focus:border-indigo-500 @error('name') border-rose-500 @enderror" type="text" id="name" name="name" value="{{ old('name') }}">
                      @error('name')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="email">Email</label>
                      <input class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-500 @error('email') border-rose-500 @enderror" type="email" id="email" name="email" value="{{ old('email') }}">
                      @error('email')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="section">Section</label>
                      <input class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-500 @error('section') border-rose-500 @enderror" type="text" id="section" name="section" value="{{ old('section') }}">
                      @error('section')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="position">Position</label>
                        <input class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-500 @error('position') border-rose-500 @enderror" type="text" id="position" name="position" value="{{ old('position') }}">
                        @error('position')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="password">Password</label>
                        <input class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-500 @error('password') border-rose-500 @enderror" type="password" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex flex-row content-center">
                        <div class="basis-1/2">
                            <a href="{{ route('user.update', ['user' => $user->id]) }}" class="btn btn-ghost">Back</a>
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
