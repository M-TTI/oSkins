<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $skin->name }}
            </h2>
            <div class="flex justify-between items-center space-x-2">
                <x-primary-button>
                    <a href="{{ route('skin.edit', [$skin->id]) }}">Edit</a>
                </x-primary-button>
                <x-danger-button>
                    <a href="{{ route('skin.edit', [$skin->id]) }}">Delete</a>
                </x-danger-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-2">
                    <h1>{{ $skin->name }}</h1>
                    <p><strong>Author:</strong> {{ $skin->author }}</p>
                    <p><strong>File Path:</strong> {{ $skin->path_to_file }}</p>
                    <x-secondary-button>
                        <a href="{{ route('skin.index') }}">Back to Skins</a>
                    </x-secondary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
