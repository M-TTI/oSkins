<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Skins') }}
            </h2>
            <h2>
                <x-primary-button>
                    <a href="{{ route('skin.create') }}">Add a skin</a>
                </x-primary-button>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Skins</h1>
                    <div class="flex space-x-4 py-4">
                        @foreach($skins as $skin)
                            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 border-b border-gray-200">
                                    <h2>{{ $skin->name }}</h2>
                                    <p><strong>Author:</strong> {{ $skin->author }}</p>
                                    <x-secondary-button>
                                        <a href="{{ route('skin.show', $skin->id) }}">View Details</a>
                                    </x-secondary-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
