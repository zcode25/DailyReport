<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row content-center">
            <div class="basis-1/2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('User') }}
                </h2>
            </div>
            <div class="basis-1/2">
                <div class="text-end">
                    <a href="{{ route('user.add') }}" class="btn btn-primary btn-sm text-white">Add</a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                @foreach ($users as $user)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-3">
                        <div class="p-6 text-gray-900">
                            <h2 class="text-xl font-bold mb-3">{{ $user->name }}</h2>
                            <p class="font-bold">Email</p>
                            <p class="mb-3"> {{ $user->email }}</p>
                            <p class="font-bold">Section</p>
                            <p class="mb-3"> {{ $user->section }}</p>
                            <p class="font-bold">Position</p>
                            <p class="mb-3"> {{ $user->position }}</p>
                            <p class="font-bold">Level</p>
                            @if ($user->level == 0)
                                <p class="mb-3">Admin</p>
                            @else
                                <p class="mb-3">User</p>
                            @endif
                            <div class="card-actions justify-end mt-5">
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-primary text-white btn-sm">Update</a>
                                <a href="{{ route('user.destroy', ['user' => $user->id]) }}" class="btn btn-secondary btn-sm text-white" data-confirm-delete="true">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
