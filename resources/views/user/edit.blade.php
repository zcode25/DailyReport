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

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form method="post" action="{{ route('user.update', ['user' => $user->id]) }}">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-6">Update User Form</h2>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="name">Name</label>
                      <input class="input input-bordered w-full bg-white @error('name') input-error @enderror" type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
                      @error('name')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="email">Email</label>
                      <input class="input input-bordered w-full bg-white @error('email') input-error @enderror" type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                      @error('email')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                      <label class="block text-gray-700 mb-2" for="section">Section</label>
                      <input class="input input-bordered w-full bg-white @error('section') input-error @enderror" type="text" id="section" name="section" value="{{ old('section', $user->section) }}">
                      @error('section')
                        <div class="text-rose-500 text-sm">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="position">Position</label>
                        <input class="input input-bordered w-full bg-white @error('position') input-error @enderror" type="text" id="position" name="position" value="{{ old('position', $user->position) }}">
                        @error('position')
                          <div class="text-rose-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-3 gap-4 text-gray-700 mb-4">
                        <div class="label">Level</div>
                        <div>
                            <div class="form-control">
                                <label class="label cursor-pointer">
                                    <span class="label-text text-gray-700">Admin</span>
                                    <input type="radio" class="radio radio-primary" id="level-0" name="level" value="0" {{ old('level', $user->level) == '0' ? 'checked' : '' }}>
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="form-control">
                                <label class="label cursor-pointer">
                                    <span class="label-text text-gray-700 text-center">User</span>
                                    <input type="radio" class="radio radio-primary" id="level-1" name="level" value="1" {{ old('level', $user->level) == '1' ? 'checked' : '' }}>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row content-center">
                        <div class="basis-1/2">
                            <a href="{{ route('user.index') }}" class="btn btn-ghost">Back</a>
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
