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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                @foreach ($users as $user)
                    <div class="card bg-white text-black shadow mb-6">
                        <div class="card-body">
                            <h2 class="card-title">{{ $user->name }}</h2>
                            <p>{{ $user->email }}</p>
                            <p>Section : {{ $user->section }}</p>
                            <p>Position : {{ $user->position }}</p>
                            <div class="card-actions justify-end">
                                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-primary text-white btn-sm">Update</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
